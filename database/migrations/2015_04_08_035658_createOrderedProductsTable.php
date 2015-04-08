<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ordered_products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('productID');
			$table->smallInteger('quantity');
			$table->double('price', 4, 2);
			$table->mediumInteger('orderID');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
