<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller {


	protected $baseImage = 'includes/baseProduct.png';
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'category', 'show', 'index']]);

        $this->middleware('admin', ['only' => ['destroy']]);
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
		$artNo = $this->articleNumber();

		if($request->file('picture'))
		{
			$newFileName = $this->getNewFileName($request->file('picture'));			
			$this->saveImage($request->file('picture'),$newFileName);
		
			$products = Product::create($request->all());			
			$products->update(['picture' => $newFileName, 'artNo' => $artNo]);
		}
		else
		{
			$products = Product::create($request->all());					
			$products->update(['artNo' => $artNo]);
		}
		
		$catIds = $request->input('category_list');

		$products->categories()->attach($catIds);

		return redirect('products');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($artNo)
	{

		$product = Product::where('artNo', '=', $artNo)->firstOrFail();



		return view('pages.showproducts', compact('product'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($artNo)
	{
		$product = Product::where('artNo', '=', $artNo)->firstOrFail();
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


	public function update($artNo, ProductRequest $request)
	{
		$product = Product::where('artNo', '=', $artNo)->firstOrFail();
		
		if($request->file('picture'))
		{

			if($product->picture != $this->baseImage)
			{			
				unlink(public_path()."/".$product->picture);
			}	

			$newFileName = $this->getNewFileName($request->file('picture'));

			$this->saveImage($request->file('picture'),$newFileName);

			$product->update($request->all());
			
			$product->update(['picture' => $newFileName]);
		}
		else
		{
			$product->update($request->all());
		}

		

		$product->categories()->sync($request->input('category_list'));

		return redirect('products');

	}


	/* Genererar ett nytt artikelnummer som skickas med i store-funktionen */
	public function articleNumber()
	{
		$last = Product::orderBy('artNo', 'desc')->first();
		$newArtNo = ($last->artNo)+1;
		return $newArtNo;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($artNo)
	{
		$product = Product::where('artNo', '=', $artNo)->firstOrFail();
	    $product->delete();

	    return redirect('products');
	}




}
