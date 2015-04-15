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
		$page 			= 'catering';
		$description 	= 'Catering Page of Lady Luck, order food online';
		$keywords 		= 'pies, home, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, order, cater, buy, online, cart, shop, deliver, delivery';
		//create new instance of the products model
		$products = new \App\Products;
		//get all items
		$menu = $products::get();
		//get cart
		$cart = \Session::get('cart');
		//return view of page
		return (view('catering', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'menu' => $menu, 'cart' => $cart]));
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
		$page 			= 'catering';
		$description 	= 'Catering Page of Lady Luck, order food online';
		$keywords 		= 'pies, home, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, order, cater, buy, online, cart, shop, deliver, delivery';
		//create new instance of the products model
		$products = new \App\Products;
		//get all items
		$menu = $products::get();
		//get cart
		$cart = \Session::get('cart');
		//return view of page
		return (view('catering', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'menu' => $menu, 'cart' => $cart]));
		//return($cart[0]);
	}

	public function checkout(){
		//get the cart
		$cart = \Session::get('cart');
		//set title
		$page 			= 'checkout';
		$description 	= 'Checkout Page of Lady Luck, order food online';
		$keywords 		= 'pies, home, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, order, cater, buy, online, cart, shop, deliver, delivery';
		//display page
		//if we have come back from the payment page
		if(isset($_GET['result']) && isset($_GET['userid'])){
			//if cart not empty
			if(\Session::has('cart')){
				//run the function that processes the order
				$success = $this -> addCartToDB();
				if($success){
					return redirect('catering/checkout/success');	
				} else {
					//return error page
					return redirect('catering/checkout/error')
				}
			} else {
				return redirect('/catering');
			}
		}
		return (view('checkout', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'cart' => $cart]));
	}

	public function processCaterForm(Requests\OrderCateringRequest $request){
		//create instance of pxpay class
		$pxpay = new \PxPay_Curl('https://sec.paymentexpress.com/pxpay/pxaccess.aspx', 'Natcoll_Dev', 'fb9f7649ebcdcca74f427183b37c6c5fca3db775e1e04e09eadc612ac786c420');
		//run redirect function
		$urlToPaymentGateway = $this -> redirectToPxPay($pxpay);
		//return(\Session::get('delivery'));
		//redirect to payment page
		return \Redirect::away($urlToPaymentGateway);
	}

	public function redirectToPxPay($pxpay){
		// Create new request object
		$request = new \PxPayRequest();
		// Variable to hold the grand total
		$grandTotal = 0;
		// Loop through each item and add the total cost to grand total
		$cart = \Session::get('cart');
		foreach( $cart as $item ) {
			$grandTotal += $item['quantity'] * $item['price'];
		}
		// Settings for the transaction
		$request->setAmountInput($grandTotal);
		$request->setTxnType( 'Purchase' );
		$request->setCurrencyInput( 'NZD' );
		$request->setUrlFail( 'http://localhost:8000/catering/checkout' );
		$request->setUrlSuccess( 'http://localhost:8000/catering/checkout' );
		$request->setTxnData1( \Request::input('orderName') );
		$request->setTxnData2( \Request::input('orderAddress') );
		$request->setTxnData3( \Request::input('orderEmail') );

		\Session::put('orderDate', \Request::input('orderDate'));
		\Session::put('delivery' , \Request::input('delivery'));
		// Convert the request into XML
		$request_string = $pxpay->makeRequest($request);
		// Send the request
		$response = new \MifMessage($request_string);
		// Recieve a response with secure URL to go to for payment
		return $response->get_element_text("URI");
		// Redirect the visitor to paymentexpress
		//return $urlToPaymentGateway;
	}

	public function addCartToDB(){
		//obtain the result
		$response = \Input::get('result');
		//create instance of pxpay class
		$pxpay = new \PxPay_Curl('https://sec.paymentexpress.com/pxpay/pxaccess.aspx', 'Natcoll_Dev', 'fb9f7649ebcdcca74f427183b37c6c5fca3db775e1e04e09eadc612ac786c420');
		//convert the response in to a php object
		$response = $pxpay->getResponse($response);
		//was transaction successful?
		if($response->getSuccess()==1){
			//add order to DB
			$order = new \App\Orders;
			//set up new order in DB
			$order->customerName 	= $response->getTxnData1();
			$order->customerAddress = $response->getTxnData2();
			$order->customerEmail 	= $response->getTxnData3();
			$order->deliveryDate 	= \Session::get('orderDate');
			$order->delivery 		= \Session::get('delivery');
			$order->status 			= 'paid';
			//save this info into the DB
			$order->save();
			//get the id of inserted record
			$id = $order->id;
			//loop through each item in the cart, adding it to the orderedProducts table
			$cart = \Session::get('cart');
			foreach($cart as $item){
				$product = new \App\OrderedProducts;
				$product->productID 	= $item['productID'];
				$product->quantity	 	= $item['quantity'];
				$product->price 		= $item['price'];
				$product->orderID 		= $id;
				$product->save();
			}
			//clear the cart
			\Session::forget('cart');
			return true;
		} else {
			return false;
		}
	}

	public function successOrder() {
		$page 			= 'success';
		$description 	= 'Success';
		$keywords 		= 'success, yay, go you';
		$type = 'order';
		return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}

	public function fail() {
		$page 			= 'error';
		$description 	= 'error';
		$keywords 		= 'error, oops, try, again';
		$type = 'order';
		return view('errorOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}
	
}
