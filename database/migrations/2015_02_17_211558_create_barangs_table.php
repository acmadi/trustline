<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barangs', function(Blueprint $table)
		{
			$table->string('id');
			$table->string('tipebarang');
			$table->string('barkode');
			$table->string('nama');
			$table->string('satuan');
			$table->double('harga_jual1', 15, 2);
			$table->double('harga_jual2', 15, 2);
			$table->double('harga_jual3', 15, 2);
			$table->double('harga_jual4', 15, 2);
			$table->double('harga_jual5', 15, 2);
			$table->double('saldo_minimum', 15, 2);
			$table->string('kontrol_satuan');
			$table->integer('kontrol_kuantitas');
			$table->string('status');
			$table->integer('gambar_id');
			$table->string('catatan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barangs');
	}

}
