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
	        'description' 	=> 'min:200|max:250',
	        'price' 		=> 'required|max:6|min:1',
	        'image' 		=> ''
		];
	}

}