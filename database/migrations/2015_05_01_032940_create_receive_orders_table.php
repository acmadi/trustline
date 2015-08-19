<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receive_orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('supplier_id')->unsigned();
			$table->integer('form_no');
			$table->date('tanggal');
			$table->date('ship_date');
			$table->string('fob');
			$table->string('catatan');
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
		Schema::drop('receive_orders');
	}

}
