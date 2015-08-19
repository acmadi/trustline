<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model {

	public $timestamps = false;

	protected $fillable = [
		'serial',
		'kadaluwarsa',
		'volume',
		'berat',
		'gambar',
		'barang_id'
	];

}
