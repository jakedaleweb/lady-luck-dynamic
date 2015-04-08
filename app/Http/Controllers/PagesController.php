<?php namespace App\Http\Controllers;

class PagesController extends Controller {


	//function to display home page
	public function index()
	{
		$page = 'home';
		return view('home', ['page' => $page]);
	}

	//function to display menu page
	public function menu()
	{	
		//create new instance of the merch model
		$products = new \App\Products;
		//get all items where type == hot
		$menu = $products::where('type', '=', 'hot')->get();
		//set page title
		$page = 'menu';
		//return view of page
		return view('menu', ['page' => $page, 'menu' => $menu]);
	}

	//function to display catering page
	public function catering()
	{	
		//create new instance of the products model
		$products = new \App\Products;
		//get all items where type == hot
		$menu = $products::get();
		//set page title
		$page = 'catering';
		//get items from cart
		if(\Session::has('cart')){
			$cart = \Session::get('cart');
			//return view of page
			return view('catering', ['page' => $page, 'menu' => $menu, 'cart' => $cart]);
			//return($array);
		} else {
			//return view of page
			return view('catering', ['page' => $page, 'menu' => $menu]);
		}
	}

	//function to display merch page
	public function merch()
	{
		//create new instance of the merch model
		$merch = new \App\Merch;
		//get all items where type == hot
		$items = $merch::get();
		//set page title
		$page = 'merch';
		//return view of page
		return view('merch', ['page' => $page, 'items' => $items]);
	}

	//function to display locations page
	public function locations()
	{	
		//create new instance of the merch model
		$locations = new \App\Locations;
		//get all items where type == hot
		$stores = $locations::get();
		//set page title
		$page = 'locations';
		//return view of page
		return view('locations', ['page' => $page, 'stores' => $stores]);
		//return response()->json($stores)->view('locations', ['page' => $page, 'stores' => $stores]);
	}

	public function getLocations(){
		$locations = new \App\Locations;
		//get all items where type == hot
		$stores = $locations::get();
		return $stores;
	}

}
