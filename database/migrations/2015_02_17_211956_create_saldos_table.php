<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaldosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('saldos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('gudang_id');
			$table->string('batch_id');
			$table->date('tanggal');
			$table->string('nomor_bukti');
			$table->integer('kuantitas');
			$table->double('hpp_satuan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('saldos');
	}

}
