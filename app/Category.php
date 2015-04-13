<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = [

		'name',
		'slug'
	];

	public function products()
	{
	    return $this->belongsToMany('App\Product');
	}

	public function getSimilarProducts($product)
	{
		return $this->products->whereNotIn('name', $product->name)->get(); // INTE KLAR!!
	}

}
