<?php namespace App\Http\Controllers;

class PagesController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$page = 'home';
		return view('home', ['page' => $page]);
	}

	public function menu()
	{	
		//create new instance of the products model, //get all items where type == hot
		$products = new \App\Products;
		$menu = $products::where('type', '=', 'hot')->get();
		$page = 'menu';
		return view('menu', ['page' => $page, 'menu' => $menu]);
	}

	public function catering()
	{
		$page = 'catering';
		return view('catering', ['page' => $page]);
	}

	public function merch()
	{
		$page = 'merch';
		return view('merch', ['page' => $page]);
	}

	public function locations()
	{
		$page = 'locations';
		return view('locations', ['page' => $page]);
	}

}
