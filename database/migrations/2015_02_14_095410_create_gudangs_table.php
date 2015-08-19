<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGudangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gudangs', function(Blueprint $table)
		{
			$table->string('id');
			$table->string('nama');
			$table->string('alamat');
			$table->string('kota');
			$table->string('propinsi');
			$table->string('negara');
			$table->string('telepon1');
			$table->string('telepon2');
			$table->string('fax');
			$table->string('penanggung_jawab');
			$table->string('status');
			$table->string('akun_persediaan');
			$table->string('akun_retur_penjualan');
			$table->string('akun_diskon_penjualan');
			$table->string('akun_barang_terkirim');
			$table->string('akun_hpp');
			$table->string('akun_retur_pembelian');
			$table->string('akun_belum_tertagih');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gudangs');
	}

}
