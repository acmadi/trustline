<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePajaksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pajaks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('nama');
			$table->double('nilai');
			$table->string('keterangan');
			$table->string('akun_pajak_penjualan');
			$table->string('akun_pajak_pembelian');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pajaks');
	}

}
