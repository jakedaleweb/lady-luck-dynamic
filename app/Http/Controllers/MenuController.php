<?php namespace App\Http\Controllers;

class MenuController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function displayType($type)
	{
		//create new instance of the products model
		$products = new \App\Products;
		//get all items where type = type
		$menu = $products::where('type', '=', $type)->get();
		$page 			= 'menu';
		$description 	= 'menu Page of Lady Luck, see our entire range here';
		$keywords 		= 'pies, menu, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, list, sausage roll, muffin';
		//send to view
		return view('menu', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'menu' => $menu]);
	}

}
