<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kurs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('mata_uang'); // foreign key
			$table->date('tanggal');
			$table->double('nilai_tukar', 15, 2);
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
		Schema::drop('kurs');
	}

}
