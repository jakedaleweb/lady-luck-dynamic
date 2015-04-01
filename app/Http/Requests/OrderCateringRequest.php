<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrderCateringRequest extends Request {

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
			'orderName' 	=> 'required|min:2|max:40',
	        'orderAddress' 	=> 'min:20',
	        'orderEmail' 	=> 'required|email',
	        'orderDate' 	=> 'required|min:'.date('d-m-Y'),
	        'delivery' 		=> 'required|in:deliver,pickup'
		];
	}

}
