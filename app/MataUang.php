<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MataUang extends Model {

	public $primaryKey = 'simbol';
	public $incrementing = false;
	public $timestamps = false;
	protected $fillable = [
		'simbol',
		'nama',
		'negara'
	];

	public function kurs() {
		return $this->hasMany('App\Kurs', 'mata_uang', 'simbol');
	}

}
