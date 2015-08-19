<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurs extends Model {

	public $timestamps = false;

	protected $fillable = [
		'mata_uang',
		'tanggal',
		'nilai_tukar',
	];

}
