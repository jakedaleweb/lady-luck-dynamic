<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CateringController extends Controller {

	//decide which function to run based on submit in post
	public function cartFunctions(){
		if(isset($_POST['addToCart'])){
			$this -> addToCart();
		} else if (isset($_POST['update'])){
			$this -> updateCart();
		}
		//set page title
		$page = 'catering';
		//create new instance of the products model
		$products = new \App\Products;
		//get all items
		$menu = $products::get();
		//get cart
		$cart = \Session::get('cart');
		//return view of page
		return (view('catering', ['page' => $page, 'menu' => $menu, 'cart' => $cart]));
	}

	//function to add an item to the cart array stored in session and show the catering page
	public function addToCart(){
		// \Session::flush();
		$cart = \Session::get('cart');
		//obtain the info of the product
		$productID 	= $_POST['productID'];
		$quantity 	= $_POST['quantity'];
		$name 		= $_POST['productName'];
		$price 		= $_POST['productPrice'];
		//set up product founf as false
		$productFound = false;
		//if quantity is more than or is 1 
		if($quantity>0 && \Session::has('cart')){
			\Session::forget('cart');
			//loop through the cart
			foreach($cart as $item){
				//if item is the one clicked
				if($item['productID'] == $productID){
					//update quantity
					$quan = $item['quantity'] + $quantity;
					$cartItem = ['name'=>$name, 'productID'=>$productID, 'quantity'=>$quan, 'price'=>$price];
					\Session::push('cart', $cartItem);	
					//update product to found
					$productFound = true;
				} else {
					\Session::push('cart', $item);
				}
			}
		} 
		//if quantity is more than 1 or is 1 AND the product hasnt been found
		if ($quantity>0 && $productFound == false){
			//update cart item
			$cartItem = ['name'=>$name, 'productID'=>$productID, 'quantity'=>$quantity, 'price'=>$price];
			\Session::push('cart', $cartItem);	
		}
	}

	public function updateCart(){
		//get current cart
		$cart = \Session::get('cart');
		//obtain the info of the product
		$productID 	= $_POST['productID'];
		$quantity 	= $_POST['quantity'];
		$name 		= $_POST['productName'];
		$price 		= $_POST['productPrice'];
		//set up product founf as false
		$productFound = false;
		//if quantity is more than 0
		if($quantity>0){
			//forget cart
			\Session::forget('cart');
			//loop through the cart
			foreach($cart as $item){
				//if item is the one selected
				if($item['productID'] == $productID){
					//update quantity
					$cartItem = ['name'=>$name, 'productID'=>$productID, 'quantity'=>$quantity, 'price'=>$price];
					\Session::push('cart', $cartItem);	
				} else {
					//otherwise just put item back in cart
					\Session::push('cart', $item);
				}
			}
		//if quantity is 0 or less	
		} else {
			//forget cart
			\Session::forget('cart');
			//loop through the cart
			foreach($cart as $item){
				//if item is not the one clicked
				if($item['productID'] != $productID){
					//add to cart
					\Session::push('cart', $item);
				}
			}
		}
	}

	//function to empty cart
	public function deleteCart(){
		//empty cart
		\Session::forget('cart');
		//set page title
		$page = 'catering';
		//create new instance of the products model
		$products = new \App\Products;
		//get all items
		$menu = $products::get();
		//get cart
		$cart = \Session::get('cart');
		//return view of page
		return (view('catering', ['page' => $page, 'menu' => $menu, 'cart' => $cart]));
		//return($cart[0]);
	}

	public function checkout(){
		//get the cart
		$cart = \Session::get('cart');
		//set title
		$page = 'checkout';
		//display page
		return (view('checkout', ['page' => $page, 'cart' => $cart]));
	}

	public function processCaterForm(Requests\OrderCateringRequest $request){

	}

}
