<?php

use App\SyaratPembayaran;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyaratPembayaransTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('syarat_pembayarans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->integer('syarat_diskon');
			$table->double('diskon');
			$table->integer('jatuh_tempo');
			$table->timestamps();
		});

		SyaratPembayaran::create([
			'id' => 0,
			'nama' => 'C.O.D',
			'syarat_diskon' => 0,
			'diskon' => 0.0,
			'jatuh_tempo' => 0
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('syarat_pembayarans');
	}

}
