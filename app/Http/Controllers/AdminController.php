<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {

	//--------------------------------------userstuff------------------------------------------------//


	public function verifyLogin() {	
		if (\Auth::attempt(['name' => \Input::get('name'), 'password' => \Input::get('password')], true)){
            return redirect('admin');
        } else {
        	return redirect('adminLogin');
        }
	}

	public function show(){
		if (\Auth::check()){
		    $page 			= 'Admin';
			$description 	= 'What are you ding here? shoo.';
			$keywords 		= 'nothing, to, see, here';
	       	return view('admin', ['page' => $page, 'keywords' => $keywords, 'description' => $description]);
		}
	}

	public function logout() {
		//logout out user
		\Auth::logout();
		return redirect('home');
	}

	//--------------------------------------enduserstuff---------------------------------------------//

	//--------------------------------------menustuff------------------------------------------------//

	public function deleteMenu($id){
		//if delete has been selected in the get
		if(\Auth::check()){
			if( isset($_GET['deleteProduct']) && $_GET['deleteProduct'] == 'true'){
			//delete product
			$menu = new \App\Products;
			$menu->where('id', '=', $id)->delete();
			//show success page
			$page 			= 'success';
			$description 	= 'Success';
			$keywords 		= 'success, yay, go you';
			$type 			= 'delete';
			return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			//show delete yes/no options
			} else {
				$menu = new \App\Products;
				$product = $menu::where('id', '=', $id)->get()->first();
				$page 			= 'delete';
				$description 	= 'delete';
				$keywords 		= 'delete, product, u, sure?';
				return view('deleteProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'product' => $product]);
			}
		} else {
			redirect('home');
		}
		
	}

	public function editMenu($id){
		if(\Auth::check()){
			//if form has been submitted
			if(isset($_POST['edit'])){
				//run edit function
				$this->edit('menu', $id);
				//return success view
				$page 			= 'success';
				$description 	= 'Success';
				$keywords 		= 'success, yay, go you';
				$type			= 'edit';
				return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$menu = new \App\Products;
				$product = $menu::where('id', '=', $id)->get()->first();
				//show view with edit form and send it the item
				$page 			= 'edit';
				$description 	= 'Edit a product';
				$keywords 		= 'edit, products';
				return view('editProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'product' => $product]);
			}
		} else {
			return redirect('home');
		}
	}

	public function addMenu() {
		if(\Auth::check()){
			//if form has been submitted
			if(isset($_POST['add'])){
				//run add function
				$this->isUploaded('menu');
				//return success view
				$page 			= 'success';
				$description 	= 'Success';
				$keywords 		= 'success, yay, go you';
				$type 			= 'add';
				return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$page 			= 'add';
				$description 	= 'add a product';
				$keywords 		= 'add, products';
				return view('addProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
			}
		} else {
			return redirect('home');
		}
	}

	//--------------------------------------endmenustuff---------------------------------------------//

	//--------------------------------------merchstuff-----------------------------------------------//
	public function deleteMerch($id){
		//if delete has been selected in the get
		if(\Auth::check()){
			if( isset($_GET['deleteProduct']) && $_GET['deleteProduct'] == 'true'){
			//delete product
			$merch = new \App\Merch;
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

	public function editMerch($id){
		if(\Auth::check()){
			//if form has been submitted
			if(isset($_POST['edit'])){
				//run edit function
				$this->edit('merch', $id);
				//return success view
				$page 			= 'success';
				$description 	= 'Success';
				$keywords 		= 'success, yay, go you';
				$type 			= 'edit';
				return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$merch 	 = new \App\Merch;
				$product = $merch::where('id', '=', $id)->get()->first();
				//show view with edit form and send it the item
				$page 			= 'edit';
				$description 	= 'Edit a product';
				$keywords 		= 'edit, products';
				return view('editProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'product' => $product]);
			}
		} else {
			return redirect('home');
		}
	}

	public function addMerch() {
		if(\Auth::check()){
			//if form has been submitted
			if(isset($_POST['add'])){
				//run add function
				$this->isUploaded('merch');
				//return success view
				$page 			= 'success';
				$description 	= 'Success';
				$keywords 		= 'success, yay, go you';
				$type 			= 'add';
				return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$page 			= 'add';
				$description 	= 'add a product';
				$keywords 		= 'add, products';
				return view('addMerch', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
			}
		} else {
			return redirect('home');
		}
	}
	//--------------------------------------endmerchstuff--------------------------------------------//

	//--------------------------------------locationstuff--------------------------------------------//
	public function deleteLocation($id){
		//if delete has been selected in the get
		if(\Auth::check()){
			if( isset($_GET['deleteProduct']) && $_GET['deleteProduct'] == 'true'){
			//delete product
			$locations = new \App\Locations;
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

	public function editLocation($id){
		if(\Auth::check()){
			//if form has been submitted
			if(isset($_POST['edit'])){
				//run edit function
				$this->edit('location', $id);
				//return success view
				$page 			= 'success';
				$description 	= 'Success';
				$keywords 		= 'success, yay, go you';
				$type 			= 'edit';
				return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$locations 	 = new \App\Locations;
				$location 	 = $locations::where('id', '=', $id)->get()->first();
				//show view with edit form and send it the item
				$page 			= 'edit';
				$description 	= 'Edit a product';
				$keywords 		= 'edit, products';
				return view('editLocation', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'location' => $location]);
			}
		} else {
			return redirect('home');
		}
	}

	public function addLocation() {
		if(\Auth::check()){
			//if form has been submitted
			if(isset($_POST['add'])){
				//run add function
				$this->isUploaded('location');
				//return success view
				$page 			= 'success';
				$description 	= 'Success';
				$keywords 		= 'success, yay, go you';
				$type 			= 'add';
				return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$page 			= 'add';
				$description 	= 'add a product';
				$keywords 		= 'add, products';
				return view('addLocation', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
			}
		} else {
			return redirect('home');
		}
	}
	//--------------------------------------endlocationstuff-----------------------------------------//

	//--------------------------------------contactstuff--------------------------------------------//
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

	public function editContact($id){
		if(\Auth::check()){
			//if form has been submitted
			if(isset($_POST['edit'])){
				//run edit function
				$this->edit('contact', $id);
				//return success view
				$page 			= 'success';
				$description 	= 'Success';
				$keywords 		= 'success, yay, go you';
				$type 			= 'edit';
				return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$contacts 	 = new \App\Contact;
				$contact 	 = $contacts::where('id', '=', $id)->get()->first();
				//show view with edit form and send it the item
				$page 			= 'edit';
				$description 	= 'Edit contact info';
				$keywords 		= 'edit, contact';
				return view('editContact', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'contact' => $contact]);
			}
		} else {
			return redirect('home');
		}
	}

	public function addContact() {
		if(\Auth::check()){
			//if form has been submitted
			if(isset($_POST['add'])){
				//run add function
				$this->add('contact');
				//return success view
				$page 			= 'success';
				$description 	= 'Success';
				$keywords 		= 'success, yay, go you';
				$type 			= 'add';
				return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$page 			= 'add';
				$description 	= 'add contact info';
				$keywords 		= 'add, contact';
				return view('addContact', ['page' => $page, 'description' => $description, 'keywords' => $keywords]);
			}
		} else {
			return redirect('home');
		}
	}
	//--------------------------------------endcontactstuff-----------------------------------------//

	public function edit($type, $id){
		if($type == 'menu'){
			$product = new \App\Products;
			$product::where('id', $id)->update([
				'name'			=> \Input::get('name'), 
				'description' 	=> \Input::get('description'),
				'price' 		=> \Input::get('price'),
				'type'			=> \Input::get('type')
			]);
		} else if($type == 'location'){
			$location = new \App\Locations;
			$location::where('id', $id)->update([
				'name'			=> \Input::get('name'), 
				'description' 	=> \Input::get('description'),
				'lat' 			=> \Input::get('lat'),
				'lng' 			=> \Input::get('lng')
			]);
		} else if($type == 'contact'){
			$contact = new \App\Contact;
			$contact::where('id', $id)->update([
				'description' 	=> \Input::get('description'),
				'contactType' 	=> \Input::get('type')
			]);
		} else if($type == 'merch'){
			$merch = new \App\Merch;
			$merch::where('id', $id)->update([
				'name'			=> \Input::get('name'), 
				'description' 	=> \Input::get('description'),
				'price' 		=> \Input::get('price')
			]);
		}
	}

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

	public function isUploaded($type){
		//check if the file reached its temporary location
		$uploaded = is_uploaded_file($_FILES['image']['tmp_name']);
		if($uploaded){
			//specify a file path
			$filepath = 'img/'.$_FILES['image']['name'];
			//move from the temp location to the specified file path
			$moved = move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
			if($moved) {
				//double check if the file exists where it was moved to
				$exists = file_exists($filepath);
				if($exists) {
					$this->add($type, basename($filepath));
				}
			}
		}
	}
}
