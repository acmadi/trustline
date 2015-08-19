<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\MataUang;

class CreateMataUangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mata_uangs', function(Blueprint $table)
		{
			$table->string('simbol');
			$table->string('nama');
			$table->string('negara');

			$table->primary('simbol');
		});

		MataUang::create([
			'simbol' => 'IDR',
			'nama' => 'Rupiah',
			'negara' => 'Indonesia',
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mata_uangs');
	}

}
