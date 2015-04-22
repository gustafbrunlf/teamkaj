<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = [

		'name',
		'price',
		'stock',
		'description',
		'picture',
		'artNo',
		'slug',
		'published',
		'user_id',


	];

	public function categories()
	{
		return $this->belongsToMany('App\Category');
	}

	public function getCategoryListAttribute()
	{
	    return $this->categories->lists('id'); // ?
	}
	public function user(){

		return $this->belongsTo('App\User');
	}

	public function getCategoryNames()
	{
		return $this->categories->lists('name');
	}

	public function sort($input)
	{
		switch ($input) {
				case 'created_atAsc':
					$products = Product::orderBy('created_at')->get();
					break;

				case 'created_atDesc':
					$products = Product::orderBy('created_at', 'DESC')->get();
					break;

				case 'priceAsc':
					$products = Product::orderBy('price')->get();
					break;

				case 'priceDesc':
					$products = Product::orderBy('price', 'DESC')->get();
					break;

				case 'nameAsc':
					$products = Product::orderBy('name')->get();
					break;

				case 'nameDesc':
					$products = Product::orderBy('name', 'DESC')->get();
					break;
				
				default:
					$products = Product::all();
					break;
				}
		return $this->products;
	}

}
