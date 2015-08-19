<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {

	public $timestamps = false;

	protected $fillable = [
		'nama',
		'alamat',
		'kota',
		'kode_pos',
		'propinsi',
		'negara',
		'telepon1',
		'telepon2',
		'fax',
		'email',
		'web',
		'contact_person',
		'telepon1_cp',
		'telepon2_cp',
		'email_cp',
		'npwp',
		'no_pkp',
		'bank_kerja1',
		'bank_kerja2',
		'bank_kerja3',
		'bank_kerja4',
		'dpp',
		'pajak1',
		'sub_total_pajak_1',
		'pajak2',
		'sub_total_pajak_2',
		'total_hutang',
		'tahun_bergabung',
		'catatan',
		'status'
	];

}
