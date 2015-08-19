<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('alamat');
			$table->string('kota');
			$table->string('kode_pos');
			$table->string('propinsi');
			$table->string('negara');
			$table->string('telepon1');
			$table->string('telepon2');
			$table->string('fax');
			$table->string('email');
			$table->string('web');
			$table->string('contact_person');
			$table->string('telepon1_cp');
			$table->string('telepon2_cp');
			$table->string('email_cp');
			$table->string('npwp');
			$table->string('no_pkp');
			$table->string('bank_kerja1');
			$table->string('bank_kerja2');
			$table->string('bank_kerja3');
			$table->string('bank_kerja4');
			$table->string('dpp');
			$table->double('pajak1',15,2);
			$table->double('sub_total_pajak_1', 15, 2);
			$table->double('pajak2',15,2);
			$table->double('sub_total_pajak_2', 15, 2);
			$table->double('total_hutang',15,2);
			$table->string('tahun_bergabung');
			$table->string('catatan');
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
		Schema::drop('suppliers');
	}

}
