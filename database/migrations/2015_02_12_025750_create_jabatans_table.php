<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Jabatan;

class CreateJabatansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jabatans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
		});

		Jabatan::create([
			'nama' => 'Default'
		]);

		Jabatan::create([
			'nama' => 'Sales'
		]);

		Jabatan::create([
			'nama' => 'Lihat yag lain lagi'
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jabatans');
	}

}
