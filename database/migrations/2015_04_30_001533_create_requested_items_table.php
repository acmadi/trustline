<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestedItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requested_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('barang_id');
			$table->integer('purchase_requisition_id');
			$table->integer('kuantitas');
			$table->integer('satuan');
			$table->integer('kuantitas_ordered');
			$table->integer('kuantitas_received');
			$table->date('tanggal_butuh');
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
		Schema::drop('requested_items');
	}

}
