<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
            'name' => 'required|unique:products|min:3',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'image' => 'image|between:2,2000|mimes:jpg,jpeg,png,bmp,gif',
            'artNo' => 'required|unique:products|min:5'
		];

		if(Request::isMethod('patch')) {
	        $rules['name'] = 'required';
	        $rules['artNo'] = 'required';
	    }

	    return $rules;
	}

}
