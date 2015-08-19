<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model {

    protected $fillable = [
		'nama',
		'alamat',
		'kota',
		'propinsi',
		'kode_pos',
		'telepon',
		'fax',
		'no_akte_pendirian',
		'npwp',
		'no_pengukuhan',
		'tanggal_pengukuhan',
		'no_seri_faktur_pajak',
		'kode_cabang',
		'jenis_usaha',
		'klu',
		'tanggal_neraca_awal',
		'nilai_tukar_neraca_awal',
		'tahun_buku_fiskal',
		'mata_uang',
	];

}
