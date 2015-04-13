<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use app\user;
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
	public function index()
	{
    	$products = Product::paginate(12);

		return view('pages.products', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::lists('name', 'id');
		return view('pages.createproduct', ['categories' => $categories]);
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
			
		\Auth::user()->product()->save($products);				
		
		
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
		$category = $product->getCategoryNames();

		if($category)
		{
			$getSimilar = Category::whereIn('name', $category)firstOrFail();
			$similar = $getSimilar->getSimilarProducts();	
		}
		else
		{
			$similar = [];		
		}
		
		return view('pages.showproducts', compact('product', 'similar'));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{
		$product = Product::where('slug', '=', $slug)->firstOrFail();
		$categories = Category::lists('name', 'id');

		return view('pages.editproduct', ['product' => $product, 'categories' => $categories]);
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

		$product->categories()->sync($request->input('category_list'));


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
		$slug = str_replace(" ", "-", $name);
		return $slug;
	}

    public function deleteproduct($slug)
    {
        $product = Product::where('slug', '=', $slug)->firstOrFail();

        return view ('pages.deleteproduct', compact('product'));
    }




}
