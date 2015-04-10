<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
			$type = 'delete';
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
				$this->edit('product', $id);
				//return success view
				$page 			= 'success';
				$description 	= 'Success';
				$keywords 		= 'success, yay, go you';
				$type = 'edit';
				return view('successOrder', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'type' => $type]);
			} else {
				$menu = new \App\Products;
				$product = $menu::where('id', '=', $id)->get()->first();
				//show view with edit form and send it the item
				$page 			= 'edit';
				$description 	= 'Edit a product';
				$keywords 		= 'edit, products';
				$type = 'delete';
				return view('editProduct', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'product' => $product]);
			}
		} else {
			redirect('home');
		}
		
	}

	public function edit($type, $id){
		if($type == 'product'){

		} else if($type == 'location'){

		} else if($type == 'contact'){

		}
	}

}
