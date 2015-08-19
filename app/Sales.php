<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model {

	protected $table = 'sales';

	protected $fillable = [
		'id',
		'id_karyawan',
		'target1',
		'komisi1',
		'target2',
		'komisi2',
		'target3',
		'komisi3',
		'target4',
		'komisi4',
		'status'
	];

	public function karyawan() {
		return $this->belongsTo('App\Karyawan', 'id_karyawan', 'id');
	}
}
