<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {

	//--------------------------------------userstuff------------------------------------------------//


	//check login
	public function verifyLogin() {	
		//if login works
		if (\Auth::attempt(['name' => \Input::get('name'), 'password' => \Input::get('password')], true)){
			//return view of page
            return redirect('admin');
        } else {
        	//redirect to login
        	return redirect('adminLogin');
        }
	}

	//show admin page
	public function show(){
		//check admin
		if (\Auth::check()){
		    $page 			= 'Admin';
			$description 	= 'What are you doing here? shoo.';
			$keywords 		= 'nothing, to, see, here';
			//return view of page
	       	return view('admin', ['page' => $page, 'keywords' => $keywords, 'description' => $description]);
		} else {
			//redirect to home
			return redirect('home');
		}
	}

	//function to logout admin
	public function logout() {
		//logout out user
		\Auth::logout();
		//redirect to home
		return redirect('home');
	}

	//--------------------------------------enduserstuff---------------------------------------------//

	//displays the orders page
	public function orders($status=''){
		//check admin
		if(\Auth::check()){
			$allOrders;
			$orders = new \App\Orders;
			if($status == 'complete'){
				$allOrders  	= $orders::where('status', '=', 'complete')->get(); 
				$status = 'Complete';
			} else {
				$allOrders  	= $orders::where('status', '=', 'paid')->get(); 
				$status = 'Paid';
			}
			$page 			= 'Orders';
			$description 	= 'What are you doing here? shoo.';
			$keywords 		= 'nothing, to, see, here';
			//return view of orders page
			return view('orders', ['page' => $page, 'keywords' => $keywords, 'description' => $description, 'orders' => $allOrders, 'status' => $status]);
		} else {
			//redirect to home page
			return redirect('home');
		}
	}

	//function to show individual order page
	public function order($id){
		//check admin
		if(\Auth::check()){
			//get order stuff
			$orders 		= new \App\Orders;
			$order  		= $orders::where('id', '=', $id)->get()->first(); 
			$orderedProduct = new \App\orderedProducts;
			$products 		= $orderedProduct::where('orderID', '=', $order->id)->get(); 
			//create instance of products model
			$menu = new \App\Products;
			//set up total var
			$grandTotal = 0;
			//loop through each product and get the name
			foreach($products as $product){
				//get name of current product
				$name = $menu::where('id', '=', $product->productID)->pluck('name');
				//set name in the products object
				$product->name = $name;
				//add price to grandtotal
				$grandTotal += $product->quantity * $product->price;
			}
			$page 			= 'Orders';
			$description 	= 'What are you doing here? shoo.';
			$keywords 		= 'nothing, to, see, here';
			//return view of order page
			return view('order', ['page' => $page, 'keywords' => $keywords, 'description' => $description, 'order' => $order, 'products' => $products, 'total' => $grandTotal]);
		} else {
			//redirect to home
			return redirect('home');
		}
	}

	//function to change orders status once completed
	public function completeOrder($id){
		if(\Auth::check()){
			$orders 		= new \App\Orders;
			$order  		= $orders::where('id', $id)->update([
				'status' => 'complete'
			]); 
			return redirect('orders/complete');
		} else {
			return redirect('home');
		}
		
	}

	//--------------------------------------menustuff------------------------------------------------//

	//function to remove an item from the products table
	public function deleteMenu($id){
		//check admin
		if(\Auth::check()){
			//if delete has been selected in the get
			if( isset($_GET['deleteProduct']) && $_GET['deleteProduct'] == 'true'){
			//delete product
			$menu = new \App\Products;
			$product = $menu::where('id', '=', $id)->get()->first();
			unlink('img/'.$product->img);
			$menu->where('id', '=', $id)->delete();
			//show success page
			$page 			= 'success';
			$description 	= 'Success';
			$keywords 		= 'success, yay, go you';
			$type 			= 'delete';
			//return success view
			return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$menu = new \App\Products;
				$product = $menu::where('id', '=', $id)->get()->first();
				$page 			= 'delete';
				$description 	= 'delete';
				$keywords 		= 'delete, product, u, sure?';
				//return delete view
				return view('deleteProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'product' => $product]);
			}
		} else {
			//redirect to home
			redirect('home');
		}	
	}

	//function to show the edit menu page
	public function showEditMenu($id){
		//check admin
		if(\Auth::check()){
			$product;
			if(!\Input::old('edit') == 'edit'){
				$menu = new \App\Products;
				$product = $menu::where('id', '=', $id)->get()->first();
				//show view with edit form and send it the item
			}else{
				$product = (object) array(
					'name' 			=> \Input::old('name'),
					'description' 	=> \Input::old('description'),
					'price' 		=> \Input::old('price'),
					'type' 			=> \Input::old('type'),
					'img' 			=> \Input::old('oldimg')
				);
			}
			$page 			= 'edit';
			$description 	= 'Edit a product';
			$keywords 		= 'edit, products';
			return view('editProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'product' => $product]);
		} else {
			return redirect('home');
		}
	}

	//function to edit a menu item
	public function editMenu(Requests\EditMenuRequest $request, $id) {
		//run edit function
		$this->isUploaded('menu', 'edit', $id);
		//return success view
		$page 			= 'success';
		$description 	= 'Success';
		$keywords 		= 'success, yay, go you';
		$type			= 'edit';
		return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}

	//function to show the add menu page
	public function showAddMenu() {
		if(\Auth::check()){
			$page 			= 'add';
			$description 	= 'add a product';
			$keywords 		= 'add, products';
			return view('addProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
		} else {
			return redirect('home');
		}
	}

	//function to add menu item
	public function addMenu(Requests\EditMenuRequest $request) {
		//run add function
		$this->isUploaded('menu', 'add');
		//return success view
		$page 			= 'success';
		$description 	= 'Success';
		$keywords 		= 'success, yay, go you';
		$type 			= 'add';
		return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}

	//--------------------------------------endmenustuff---------------------------------------------//

	//--------------------------------------merchstuff-----------------------------------------------//

	//function to remove an item from the merch table
	public function deleteMerch($id){
		//if delete has been selected in the get
		if(\Auth::check()){
			if( isset($_GET['deleteProduct']) && $_GET['deleteProduct'] == 'true'){
			//delete product
			$merch = new \App\Merch;
			$item = $merch::where('id', '=', $id)->get()->first();
			unlink('img/'.$item->img);
			$merch->where('id', '=', $id)->delete();
			//show success page
			$page 			= 'success';
			$description 	= 'Success';
			$keywords 		= 'success, yay, go you';
			$type 			= 'delete';
			return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			//show delete yes/no options
			} else {
				$merch 			= new \App\Merch;
				$product 		= $merch::where('id', '=', $id)->get()->first();
				$page 			= 'delete';
				$description 	= 'delete';
				$keywords 		= 'delete, product, u, sure?';
				return view('deleteProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'product' => $product]);
			}
		} else {
			redirect('home');
		}
		
	}

	//function to show the edit merch page
	public function showEditMerch($id){
		if(\Auth::check()){
			$product;
			if(!\Input::old('edit') == 'edit'){
				$merch 	 = new \App\Merch;
				$product = $merch::where('id', '=', $id)->get()->first();
			} else {
				$product = (object) array(
					'name' 			=> \Input::old('name'),
					'description' 	=> \Input::old('description'),
					'price' 		=> \Input::old('price'),
					'type' 			=> \Input::old('type'),
					'img' 			=> \Input::old('oldimg')
				);
			}
			//show view with edit form and send it the item
			$page 			= 'edit';
			$description 	= 'Edit a product';
			$keywords 		= 'edit, products';
			return view('editProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'product' => $product]);
		} else {
			return redirect('home');
		}
	}

	//function to edit a merch item
	public function editMerch(Requests\EditMerchRequest $request, $id){
		//run edit function
		$this->isUploaded('merch', 'edit', $id);
		//return success view
		$page 			= 'success';
		$description 	= 'Success';
		$keywords 		= 'success, yay, go you';
		$type 			= 'edit';
		return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}

	//function to show the add merch page
	public function showAddMerch() {
		if(\Auth::check()){
			$page 			= 'add';
			$description 	= 'add a product';
			$keywords 		= 'add, products';
			return view('addMerch', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
		} else {
			return redirect('home');
		}
	}

	//function to add merch item
	public function addMerch(Requests\EditMerchRequest $request){
		//run add function
		$this->isUploaded('merch', 'add');
		//return success view
		$page 			= 'success';
		$description 	= 'Success';
		$keywords 		= 'success, yay, go you';
		$type 			= 'add';
		return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}
	//--------------------------------------endmerchstuff--------------------------------------------//

	//--------------------------------------locationstuff--------------------------------------------//

	//function to remove an item from the locations table
	public function deleteLocation($id){
		//if delete has been selected in the get
		if(\Auth::check()){
			if( isset($_GET['deleteProduct']) && $_GET['deleteProduct'] == 'true'){
			//delete product
			$locations = new \App\Locations;
			$location = $locations::where('id', '=', $id)->get()->first();
			unlink('img/'.$location->img);
			$locations->where('id', '=', $id)->delete();
			//show success page
			$page 			= 'success';
			$description 	= 'Success';
			$keywords 		= 'success, yay, go you';
			$type 			= 'delete';
			return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			//show delete yes/no options
			} else {
				$locations 		= new \App\Locations;
				$location 		= $locations::where('id', '=', $id)->get()->first();
				$page 			= 'delete';
				$description 	= 'delete';
				$keywords 		= 'delete, location, u, sure?';
				return view('deleteLocation', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'location' => $location]);
			}
		} else {
			redirect('home');
		}
		
	}

	//function to show the edit location page
	public function showEditLocation($id){
		if(\Auth::check()){
			$location;
			if(!\Input::old('edit') == 'edit'){
				$locations 	 = new \App\Locations;
				$location 	 = $locations::where('id', '=', $id)->get()->first();
			} else {
				$location = (object) array(
					'name' 			=> \Input::old('name'),
					'description' 	=> \Input::old('description'),
					'lat' 			=> \Input::old('lat'),
					'lng' 			=> \Input::old('lng'),
					'img' 			=> \Input::old('oldimg')
				);
			}
			//show view with edit form and send it the item
			$page 			= 'edit';
			$description 	= 'Edit a product';
			$keywords 		= 'edit, products';
			return view('editLocation', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'location' => $location]);
		} else {
			return redirect('home');
		}
	}

	//function to edit a location
	public function editLocation(Requests\EditLocationRequest $request, $id){
		$this->isUploaded('location', 'edit', $id);
		//return success view
		$page 			= 'success';
		$description 	= 'Success';
		$keywords 		= 'success, yay, go you';
		$type 			= 'edit';
		return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}

	//function to show the add location page
	public function showAddLocation() {
		if(\Auth::check()){
			$page 			= 'add';
			$description 	= 'add a product';
			$keywords 		= 'add, products';
			return view('addLocation', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
		} else {
			return redirect('home');
		}
	}

	//function to add location
	public function addLocation(Requests\EditLocationRequest $request){
		$this->isUploaded('location', 'add');
		//return success view
		$page 			= 'success';
		$description 	= 'Success';
		$keywords 		= 'success, yay, go you';
		$type 			= 'add';
		return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}
	//--------------------------------------endlocationstuff-----------------------------------------//

	//--------------------------------------contactstuff--------------------------------------------//

	//function to remove an item from the contacts table
	public function deleteContact($id){
		//if delete has been selected in the get
		if(\Auth::check()){
			if( isset($_GET['deleteProduct']) && $_GET['deleteProduct'] == 'true'){
			//delete product
			$contact = new \App\Contact;
			$contact->where('id', '=', $id)->delete();
			//show success page
			$page 			= 'success';
			$description 	= 'Success';
			$keywords 		= 'success, yay, go you';
			$type 			= 'delete';
			return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			//show delete yes/no options
			} else {
				$contact 		= new \App\Contact;
				$contact 		= $contact::where('id', '=', $id)->get()->first();
				$page 			= 'delete';
				$description 	= 'delete';
				$keywords 		= 'delete, contact, u, sure?';
				return view('deleteContact', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'contact' => $contact]);
			}
		} else {
			redirect('home');
		}
		
	}

	//function to show the edit contact page
	public function showEditContact($id){
		if(\Auth::check()){
			$contact;
			if(!\Input::old('edit') == 'edit'){
				$contacts 	 = new \App\Contact;
				$contact 	 = $contacts::where('id', '=', $id)->get()->first();
			} else {
				$contact = (object) array(
					'description' 	=> \Input::old('description'),
					'type' 			=> \Input::old('type')
				);
			}
			//show view with edit form and send it the item
			$page 			= 'edit';
			$description 	= 'Edit contact info';
			$keywords 		= 'edit, contact';
			return view('editContact', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'contact' => $contact]);
		} else {
			return redirect('home');
		}
	}

	//function to edit contact info
	public function editContact(Requests\EditContactRequest $request, $id) {
		$this->edit('contact', '', $id);
		//return success view
		$page 			= 'success';
		$description 	= 'Success';
		$keywords 		= 'success, yay, go you';
		$type 			= 'edit';
		return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}

	//function to show the add contact page
	public function showAddContact() {
		if(\Auth::check()){
			$page 			= 'add';
			$description 	= 'add contact info';
			$keywords 		= 'add, contact';
			return view('addContact', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
		} else {
			return redirect('home');
		}
	}

	//function to add contact info
	public function addContact(Requests\EditContactRequest $request){
		//run add function
		$this->add('contact');
		//return success view
		$page 			= 'success';
		$description 	= 'Success';
		$keywords 		= 'success, yay, go you';
		$type 			= 'add';
		return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
	}
	//--------------------------------------endcontactstuff-----------------------------------------//

	//edits an item in the db
	public function edit($type, $id, $filepath=''){
		if($type == 'menu'){
			$product = new \App\Products;
			if($filepath != ''){
				$product::where('id', $id)->update([
					'name'			=> \Input::get('name'), 
					'description' 	=> \Input::get('description'),
					'price' 		=> \Input::get('price'),
					'type'			=> \Input::get('type'),
					'img'			=> $filepath
				]);
			} else {
				$product::where('id', $id)->update([
					'name'			=> \Input::get('name'), 
					'description' 	=> \Input::get('description'),
					'price' 		=> \Input::get('price'),
					'type'			=> \Input::get('type')
				]);
			}
		} else if($type == 'location'){
			$location = new \App\Locations;
			if($filepath != ''){
				$location::where('id', $id)->update([
					'name'			=> \Input::get('name'), 
					'description' 	=> \Input::get('description'),
					'lat' 			=> \Input::get('lat'),
					'lng' 			=> \Input::get('lng'),
					'img'			=> $filepath
				]);
			} else {
				$location::where('id', $id)->update([
					'name'			=> \Input::get('name'), 
					'description' 	=> \Input::get('description'),
					'lat' 			=> \Input::get('lat'),
					'lng' 			=> \Input::get('lng')
				]);
			}
		} else if($type == 'contact'){
			$contact = new \App\Contact;
			$contact::where('id', $id)->update([
				'description' 	=> \Input::get('description'),
				'contactType' 	=> \Input::get('type')
			]);
		} else if($type == 'merch'){
			$merch = new \App\Merch;
			if($filepath != ''){
				$merch::where('id', $id)->update([
					'name'			=> \Input::get('name'), 
					'description' 	=> \Input::get('description'),
					'price' 		=> \Input::get('price'),
					'img'			=> $filepath
				]);
			} else {
				$merch::where('id', $id)->update([
					'name'			=> \Input::get('name'), 
					'description' 	=> \Input::get('description'),
					'price' 		=> \Input::get('price')
				]);
			}
			
		}
	}

	//adds item to db
	public function add($type, $filepath=''){
		if($type == 'menu'){
			$product = new \App\Products;
			$product::insert([
				'name'			=> \Input::get('name'), 
				'description' 	=> \Input::get('description'),
				'price' 		=> \Input::get('price'),
				'type'			=> \Input::get('type'),
				'img'			=> $filepath
			]);
		} else if($type == 'location'){
			$location = new \App\Locations;
			$location::insert([
				'name'			=> \Input::get('name'), 
				'description' 	=> \Input::get('description'),
				'lat' 			=> \Input::get('lat'),
				'lng' 			=> \Input::get('lng'),
				'img'			=> $filepath
			]);
		} else if($type == 'contact'){
			$contact = new \App\Contact;
			$contact::insert([ 
				'description' 	=> \Input::get('description'),
				'contactType' 	=> \Input::get('type'),
			]);
		} else if($type == 'merch'){
			$product = new \App\Merch;
			$product::insert([
				'name'			=> \Input::get('name'), 
				'description' 	=> \Input::get('description'),
				'price' 		=> \Input::get('price'),
				'img'			=> $filepath
			]);
		}
	}

	//function to add upload image, redirects to either add() or edit()s
	public function isUploaded($type, $addEdit, $id=''){
		if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
			//check if the file reached its temporary location
			$uploaded = is_uploaded_file($_FILES['image']['tmp_name']);
			if($uploaded){
				//specify a file path
				$filepath = 'img/'.uniqid().$_FILES['image']['name'];
				//move from the temp location to the specified file path
				$moved = move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
				if($moved) {
					//double check if the file exists where it was moved to
					$exists = file_exists($filepath);
					if($exists) {
						if($addEdit == 'add'){
							$this->add($type, basename($filepath));
						} else {
							$this->edit($type, $id, basename($filepath));
						}
					}
				}
			}
		} else {
			if($addEdit == 'add'){
				$this->add($type);
			} else {
				$this->edit($type, $id);
			}
		}
	}
}
