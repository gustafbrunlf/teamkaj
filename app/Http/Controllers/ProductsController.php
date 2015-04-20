<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller {


	protected $baseImage = 'includes/baseProduct.png';
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'category', 'show', 'index']]);

        $this->middleware('admin', ['only' => ['destroy', 'deleteproduct']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
    {
    	$products = $this->sort($request->input('sort'))
    					->where('published', '!=', 0)
            			->paginate(12);

        $sort = 'created_atDesc';

        if ($request->input('sort'))
        	$sort = $request->input('sort');     

		return view('pages.products', compact('products', 'sort'));
	}


	public function overview(Request $request)
	{
		if ($request->input('sort'))
		{
			$products = $this->sort($request->input('sort'));
        }

        else if($request->input('filter'))
        {
        	switch ($request->input('filter'))
        	{
        		case 'user':
        			$input = Auth::user()->id;
        			$products = Product::where('user_id', '=', $input)->get();
        			break;

        		case 'published':
        			$input = 1;
        			$products = Product::where('published', '=', $input)->get();
        			break;

        		case 'unpublished':
        			$input = 0;
        			$products = Product::where('published', '=', $input)->get();
        			break;
        			
        		default:
        			$products = Product::all();
        			break;
        	}

        }

        else
        {
			$products = Product::all();
		}

		$users = User::all();
		return view('pages.productsOverview', compact('products', 'users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all();
		return view('pages.createproduct', compact('categories'));
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProductRequest $request)
	{
		$slug = $this->slugify($request->name);
		
		$products = new Product($request->all());

		$products->slug = $slug;

		$catIds = $request->input('category_list');


		if($request->file('picture'))
		{
			$newFileName = $this->getNewFileName($request->file('picture'));			
			$this->saveImage($request->file('picture'),$newFileName);
	
			$products->picture = $newFileName;
		}
			
		Auth::user()->product()->save($products);

		if(Auth::user()->user_type == 0)
		{
			$products->user_id = $request->user_id;
			$products->save();
		}

		
		$products->categories()->attach($catIds);

		return redirect('products');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{

		$product = Product::where('slug', '=', $slug)->firstOrFail();
		$categories = $product->getCategoryNames();

		$similar = Product::
            join('category_product', 'products.id', '=', 'category_product.product_id')
            ->join('categories', 'category_product.category_id', '=', 'categories.id')
            ->distinct()->select('products.name', 'products.slug', 'products.picture')
            ->where('products.name', '!=', $product->name)
            ->where('products.published', '=', '1')
            ->whereIn('categories.name', $categories)
            ->orderByRaw("RAND()")
            ->take(5)
            ->get();
		
		return view('pages.showproducts', compact('product', 'similar'));

	}

	// public function showPublishDashboard()
	// {
	// 	$unpublished = Product::where('published','=','0')->get();
	// 	$published = Product::where('published','=','1')->get();
	// 	return view("pages.publishedDashboard",compact('unpublished','published'));
	// }
	// public function updatePublishDashboard(request $request){
		
	// 	foreach($request->name as $name){

	// 	$product = Product::where('name', '=', $name)->firstOrFail();
	// 	$int = 1;
	// 	$product->published = $int;
		
	// 	}
		
	// 	return redirect("productspublishDashboard");
	// }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{
		$product = Product::where('slug', '=', $slug)->firstOrFail();
		$categories = Category::all();

		return view('pages.editproduct', compact('product', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */


	public function saveImage($file,$destination){

      		$newfile = Image::make($file)->resize(300,null, function ($constraint) {
   			 $constraint->aspectRatio();
   			 $constraint->upsize();
			})->save($destination);

			return;

	}

	public function getNewFileName($fileObject){

		$newExtension = $fileObject->getClientOriginalExtension(); // getting image extension
		      		
		$newFileName = "uploads/".rand(11111,99999).'.'.$newExtension;


		return $newFileName;
	}


	public function update($slug, ProductRequest $request)
	{
		$product = Product::where('slug', '=', $slug)->firstOrFail();

		$slug = $this->slugify($request->name);

		if($request->file('picture'))
		{

			if($product->picture != $this->baseImage)
			{			
				unlink(public_path()."/".$product->picture);
			}	

			$newFileName = $this->getNewFileName($request->file('picture'));

			$this->saveImage($request->file('picture'),$newFileName);

			$product->update($request->all());
			$product->update(['picture' => $newFileName, 'slug' => $slug]);
		}
		else
		{
			$product->update($request->all());
			$product->update(['slug' => $slug]);
		}

		if($request->input('category_list'))
		{
			$product->categories()->sync($request->input('category_list'));
		}
		else
		{
			$product->categories()->sync([]);
		}


		if(Auth::user()->user_type == 0)
		{
			$product->user_id = $request->user_id;
			$product->update();
		}

		return redirect("products/{$slug}");

	}




	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::where('id', '=', $id)->firstOrFail();
	    $product->delete();

	    return redirect('products');
	}

	/* Generates a slug from the name */
	public function slugify($name)
	{
		$slug = strtolower(str_replace(" ", "-", $name));
		return $slug;
	}

    public function deleteproduct($slug)
    {
        $product = Product::where('slug', '=', $slug)->firstOrFail();

        return view ('pages.deleteproduct', compact('product'));
    }

    public function sort($input)
	{
		switch ($input) {

				case 'created_atDesc':
					$products = Product::orderBy('created_at', 'DESC');
					break;

				case 'created_atAsc':
					$products = Product::orderBy('created_at');
					break;

				case 'priceAsc':
					$products = Product::orderBy('price');
					break;

				case 'priceDesc':
					$products = Product::orderBy('price', 'DESC');
					break;

				case 'nameAsc':
					$products = Product::orderBy('name');
					break;

				case 'nameDesc':
					$products = Product::orderBy('name', 'DESC');
					break;
				
				default:
					$products = Product::orderBy('created_at', 'DESC');
					break;
				}
		return $products;
	}




}
