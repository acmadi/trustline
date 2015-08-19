<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseordersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchaseorders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('supplier_id')->unsigned();
			$table->string('ship_to');
			$table->date('tanggal');
			$table->string('fob');
			$table->integer('syaratpembayaran_id');
			$table->date('expected_date');
			$table->double('freight');
			$table->string('catatan');
			$table->string('akun_dp');
			$table->double('discount');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchaseorders');
	}

}
