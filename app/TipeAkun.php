<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeAkun extends Model {

	protected $table = 'tipeakuns';

	public $timestamps = false;

	protected $fillable = ['nama'];

	public function akun() {
		return $this->hasMany('App\Akun', 'id_tipeakun', 'id');
	}
}
