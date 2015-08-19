<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ordered_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('purchase_order_id')->unsigned();
			$table->integer('requested_item_id')->unsigned();
			$table->integer('kuantitas');
			$table->double('price');
			$table->double('discount');
			$table->double('tax');
			$table->double('amount');
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
		Schema::drop('ordered_items');
	}

}
