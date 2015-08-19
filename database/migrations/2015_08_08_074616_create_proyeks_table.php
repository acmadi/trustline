<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyeksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proyeks', function(Blueprint $table)
		{
			$table->string('id')->primary;
			$table->string('nama');
			$table->string('deskripsi');
			$table->string('kontak');
			$table->string('manajer');
			$table->date('tanggal_mulai');
			$table->date('tanggal_selesai');
			$table->double('komplit');
			$table->string('pelanggan');
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
		Schema::drop('proyeks');
	}

}
