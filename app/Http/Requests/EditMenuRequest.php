<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditMenuRequest extends Request {

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
		return [
			'name' 			=> 'required|min:2|max:40',
	        'description' 	=> 'min:90|max:200',
	        'price' 		=> 'required|regex:/^[0-9]{1,2}(\.[0-9]{1,2})?$/',
	        'type' 			=> 'required|in:hot,cold,drink',
	        'image' 		=> 'required_if:add,add'
		];
	}

}