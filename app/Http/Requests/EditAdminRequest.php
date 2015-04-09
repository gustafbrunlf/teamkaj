<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditAdminRequest extends Request {

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
		];

        if(Request::isMethod('patch')) {
            $rules['name'] = 'required';
            $rules['email'] = 'required|email';
        }

        return $rules;
	}

}
