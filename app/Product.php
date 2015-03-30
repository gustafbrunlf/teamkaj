<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = [

		'name',
		'price',
		'stock',
		'description',
		'picture'

	];

	public function categories()
	{
		return $this->belongsToMany('App\Category');
	}

	public function getGenreListAttribute()
	{
	    return $this->categories->lists('id'); // ?
	}

}
