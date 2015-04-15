<?php namespace App\Http\Controllers;

class PagesController extends Controller {


	//function to display home page
	public function index() {
		$description 	= 'Home Page of Lady Luck, delicious pies and great service in Wellington';
		$keywords 		= 'pies, home, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand';
		$page 			= 'home';
		//return view of page
		return view('home', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
	}

	//function to display menu page
	public function menu() {	
		//create new instance of the merch model
		$products = new \App\Products;
		//get all items where type == hot
		$menu = $products::where('type', '=', 'hot')->get();
		//set page title
		$page 			= 'menu';
		$description 	= 'menu Page of Lady Luck, see our entire range here';
		$keywords 		= 'pies, menu, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, list, sausage roll, muffin';
		//return view of page
		return view('menu', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'menu' => $menu]);
	}

	//function to display catering page
	public function catering() {	
		//create new instance of the products model
		$products = new \App\Products;
		//get all items where type == hot
		$menu = $products::get();
		//set page title
		$page 			= 'catering';
		$description 	= 'Catering Page of Lady Luck, order food online';
		$keywords 		= 'pies, home, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, order, cater, buy, online, cart, shop, deliver, delivery';
		//get items from cart
		if(\Session::has('cart')){
			$cart = \Session::get('cart');
			//return view of page with cart
			return view('catering', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'menu' => $menu, 'cart' => $cart]);
			//return($array);
		} else {
			//return view of page without cart
			return view('catering', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'menu' => $menu]);
		}
	}

	//function to display merch page
	public function merch() {
		//create new instance of the merch model
		$merch = new \App\Merch;
		//get all items where type == hot
		$items = $merch::get();
		//set page title
		$page 			= 'merch';
		$description 	= 'Merch Page of Lady Luck, see our entire merchandise range here';
		$keywords 		= 'pies, home, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, merchandise, clothes, gift, t-shirt, pants, mug, buy, memorabilia';
		//return view of page
		return view('merch', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'items' => $items]);
	}

	//function to display locations page
	public function locations() {	
		//create new instance of the merch model
		$locations = new \App\Locations;
		//get all items where type == hot
		$stores = $locations::get();
		//set page title
		$page 			= 'locations';
		$description 	= 'Locations Page of Lady Luck, delicious pies and great service in Wellington';
		$keywords 		= 'pies, home, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, locations, map, directions, caravan, shops';
		//return view of page
		return view('locations', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'stores' => $stores]);
	}

	//function to send db info to maps.js via AJAX
	public function getLocations() {
		$locations = new \App\Locations;
		//get all items where type == hot
		$stores = $locations::get();
		return $stores;
	}

	//function to display contact page
	public function contact() {	
		//get contact info
		$contact = new \App\Contact;
		//get all items where type == hot
		$phone 	= $contact::where('contactType', '=', 'phone')->get();
		$post 	= $contact::where('contactType', '=', 'post')->get();
		$email	= $contact::where('contactType', '=', 'email')->get();
		//set page title
		$page 			= 'contact';
		$description 	= 'Contact Page of Lady Luck, here you can find our phone numbers, addresses etc';
		$keywords 		= 'pies, home, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, phone, call, post, address, email';
		//return view of page
		return view('contact', ['page' => $page, 'description' => $description, 'keywords' => $keywords,  'phone' => $phone, 'post' => $post, 'email' => $email]);
	}

	//function to login in to admin/go to admin page
	public function admin(){
		$page 			= 'Admin login';
		$description 	= 'What are you ding here? shoo.';
		$keywords 		= 'nothing, to, see, here';
		if(\Auth::check()){
			//return view of page
			return redirect('admin');
		} else {
			//return view of page
			return view('auth.login', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
		}
	}

}
