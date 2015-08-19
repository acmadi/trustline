<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model {

	public $timestamps = false;

	protected $fillable = [
		'id',
        'nama'
	];

	public function karyawans() {
		return $this->hasMany('App\Karyawan', 'id_jabatan', 'id');
	}
}
