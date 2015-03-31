<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
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
		return view('pages.create');
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
      		$newfile = Image::make($request->file('image'))->resize(400, null, function ($constraint) {
    $constraint->aspectRatio();

    $constraint->upsize(); //no idea but it works

})->save($destinationPath.$fileName);
			Product::create([

				'name'=>$request->name,
				'price'=>$request->price,
				'stock'=>$request->stock,
				'description'=>$request->description,
				'picture'=>$destinationPath.$fileName,

				]);
			return redirect('products');
		}

		Product::create($request->all());

		return redirect('products');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		return view('pages.show', compact('product'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
