<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditLocationRequest extends Request {

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
	        'description' 	=> 'min:150|max:250',
	        'lat' 			=> 'required|max:13|min:6',
	        'lng' 			=> 'required|max:13|min:6',
	        'image' 		=> 'required_if:add,add'
		];
	}

}
