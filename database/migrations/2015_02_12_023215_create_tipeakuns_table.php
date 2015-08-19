<?php

use App\TipeAkun;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipeakunsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipeakuns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('normal');
		});

		TipeAkun::create([
			'nama' => 'Ekuitas',
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tipeakuns');
	}

}
