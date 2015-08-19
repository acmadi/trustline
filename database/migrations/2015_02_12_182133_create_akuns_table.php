<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkunsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('akuns', function(Blueprint $table)
		{
			$table->string('no_akun');
			$table->string('nama');
			$table->string('mata_uang');
			$table->integer('id_tipeakun')->unsigned();
			$table->date('tanggal');
			$table->double('saldo_awal', 15, 2);

			$table->primary('no_akun');

			$table->foreign('id_tipeakun')
				  ->references('id')
				  ->on('tipeakuns');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('akuns');
	}

}
