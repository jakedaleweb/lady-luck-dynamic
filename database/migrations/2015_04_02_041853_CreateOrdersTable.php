<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('customerName', 40);
			$table->text('customerAddress');
			$table->text('customerEmail');
			$table->enum('delivery', ['delivered', 'pickup']);
			$table->text('deliveryDate');
			$table->enum('status', ['paid', 'intransit', 'complete']);
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
