<?php namespace App\Http\Controllers;

class MenuController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index($type)
	{
		//create new instance of the products model
		$products = new \App\Products;
		//get all items where type = type
		$menu = $products::where('type', '=', $type)->get();
		$page = 'menu';
		//send to view
		return view('menu', ['page' => $page, 'menu' => $menu]);
	}

}
