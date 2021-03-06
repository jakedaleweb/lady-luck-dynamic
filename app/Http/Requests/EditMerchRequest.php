<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditMerchRequest extends Request {

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
	        'description' 	=> 'min:100|max:250',
	        'price' 		=> 'required|regex:/^[0-9]{1,3}(\.[0-9]{1,2})?$/',
	        'image' 		=> 'required_if:add,add'
		];
	}

}