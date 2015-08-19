<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerusahaansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perusahaans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('nama');
			$table->string('alamat');
			$table->string('kota');
			$table->string('propinsi');
			$table->string('kode_pos');
			$table->string('telepon');
			$table->string('fax');
			$table->string('no_akte_pendirian');
			$table->string('npwp');
			$table->string('no_pengukuhan');
			$table->date('tanggal_pengukuhan');
			$table->string('no_seri_faktur_pajak');
			$table->string('kode_cabang');
			$table->string('jenis_usaha');
			$table->string('klu');
			$table->date('tanggal_neraca_awal');
			$table->string('nilai_tukar_neraca_awal');
			$table->string('tahun_buku_fiskal');
			$table->string('mata_uang');
			$table->string('jenis_mata_uang');
			$table->string('jenis_gudang');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('perusahaans');
	}

}
