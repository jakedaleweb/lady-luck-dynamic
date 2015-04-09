<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MerchController extends Controller {

	public function showItem($id)
	{
		//create new instance of the products model
		$merch = new \App\Merch;
		//get all items where type = type
		$item = $merch::where('id', '=', $id)->get()->first();
		//get page info
		$page 			= 'merch';
		$description 	= 'Merch Page of Lady Luck, see our entire merchandise range here';
		$keywords 		= 'pies, home, lady luck, lady, luck, food, catering, coffee, Wellington, new zealand, merchandise, clothes, gift, t-shirt, pants, mug, buy, memorabilia';
		//send to view
		return view('merchItem', ['page' => $page, 'description' => $description, 'keywords' => $keywords, 'item' => $item]);
	}

}
