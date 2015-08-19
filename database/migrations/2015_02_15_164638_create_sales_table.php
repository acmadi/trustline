<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('id_karyawan');
			$table->string('target1');
			$table->double('komisi1', 15, 2);
			$table->string('target2');
			$table->double('komisi2', 15, 2);
			$table->string('target3');
			$table->double('komisi3', 15, 2);
			$table->string('target4');
			$table->double('komisi4', 15, 2);
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
		Schema::drop('sales');
	}

}
