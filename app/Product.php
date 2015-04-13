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
		'slug'

	];

	public function categories()
	{
		return $this->belongsToMany('App\Category');
	}

	public function getCategoryListAttribute()
	{
	    return $this->categories->lists('id'); // ?
	}
	public function owner(){

		return $this->belongsTo('App\User');
	}

	public function getCategoryNames()
	{
		return $this->categories->lists('name');
	}

}
