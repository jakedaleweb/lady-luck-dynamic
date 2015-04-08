<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MerchController extends Controller {

	public function showItem($id)
	{
		//create new instance of the products model
		$merch = new \App\Merch;
		//get all items where type = type
		$item = $merch::where('id', '=', $id)->get()->first();
		
		$page = 'Merch item';
		//send to view
		return view('merchItem', ['page' => $page, 'item' => $item]);
	}

}
