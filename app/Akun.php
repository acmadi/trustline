<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model {

	public $primaryKey = 'no_akun';

	public $incrementing = false;

	public $timestamps = false;

	protected $fillable = [
		'no_akun',
		'nama',
		'mata_uang',
		'id_tipeakun',
		'saldo_awal',
		'tanggal',
	];

	public function tipeakun() {
		return $this->belongsTo('App\TipeAkun', 'id_tipeakun', 'id');
	}

	public function mataUang() {
		return $this->belongsTo('App\MataUang', 'mata_uang', 'simbol');
	}
}
