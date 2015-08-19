<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivedItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('received_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('receive_order_id')->unsigned();
			$table->integer('ordered_item_id')->unsigned();
			$table->integer('kuantitas');
			$table->integer('gudang_id')->unsigned();
			$table->integer('batch_id')->unsigned();
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
		Schema::drop('received_items');
	}

}
