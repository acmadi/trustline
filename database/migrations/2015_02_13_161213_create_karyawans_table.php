<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('karyawans', function(Blueprint $table)
		{
			$table->string('id');
			$table->timestamps();
			$table->string('nama');
			$table->string('alamat');
			$table->string('kota');
			$table->string('propinsi');
			$table->string('telepon');
			$table->string('hp');
			$table->string('agama');
			$table->string('pendidikan_terakhir');
			$table->string('tahun_masuk');
			$table->integer('id_jabatan'); // dropdown
			$table->double('gaji_pokok', 15, 2);
			$table->double('tunjangan1', 15, 2); // %
			$table->double('tunjangan2', 15, 2); // %
			$table->double('tunjangan3', 15, 2); // %
			$table->double('tunjangan4', 15, 2); // rupiah
			$table->double('tunjangan5', 15, 2); // rupiah
			$table->double('tunjangan6', 15, 2); // rupiah
			$table->string('npwp');
			$table->string('status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('karyawans');
	}

}
