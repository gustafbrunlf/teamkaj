<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    	$products = Product::paginate(12);

		return view('pages.products',compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::lists('name', 'id');
		return view('pages.create', ['categories' => $categories]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProductRequest $request)
	{
		if($request->file('image')){
			$destinationPath = 'uploads/'; // upload path
			$extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
      		$fileName = rand(11111,99999).'.'.$extension;
      		$newfile = Image::make($request->file('image'))->fit(300,null, function ($constraint) {
   			 $constraint->aspectRatio();
			})->save($destinationPath.$fileName);
			$products = Product::create([

				'name'=>$request->name,
				'price'=>$request->price,
				'stock'=>$request->stock,
				'description'=>$request->description,
				'picture'=>$destinationPath.$fileName,

				]);
			$catIds = $request->input('category_list');

			$products->categories()->attach($catIds);

			return redirect('products');
		}

		$products = Product::create($request->all());
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
		$product = Product::findOrFail($artNo);
		return view('pages.show', compact('product'));
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

		// dd($product, $categories);
		return view('pages.edit', ['product' => $product, 'categories' => $categories]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($artNo, ProductRequest $request)
	{
		$product = Product::where('artNo', '=', $artNo)->firstOrFail();
		$product->update($request->all());
		$product->categories()->sync($request->input('category_list'));

		return redirect('products');
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

	public function category($name)
	{
		$category = Category::where('name', '=', $name)->firstOrFail();

		return view('pages.categories', ['category' => $category]);
	}


	public function articleNumber()
	{
		$last = Product::orderBy('artNo', 'desc')->first();
		$last = $last->artNo;
		$newArtNo = $last;
		return $newArtNo; // INTE KLAR
	}

}
