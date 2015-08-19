<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batches', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('serial');
			$table->string('barang_id');
			$table->date('kadaluwarsa');
			$table->double('volume');
			$table->double('berat');
			$table->string('gambar');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('batches');
	}

}
