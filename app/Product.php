<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = [

		'name',
		'price',
		'stock',
		'description',
		'picture',
		'artNo'

	];

	public function categories()
	{
		return $this->belongsToMany('App\Category');
	}

	public function getCategoryListAttribute()
	{
	    return $this->categories->lists('id'); // ?
	}

	public function getCategoryNames()
	{
		return $this->categories->lists('name');
	}

}
