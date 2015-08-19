<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model {

	public $incrementing = false;

	public $timestamps = false;

    protected $fillable = [
		'id',
		'nama',
		'alamat',
		'kota',
		'propinsi',
		'negara',
		'telepon1',
		'telepon2',
		'fax',
		'penanggung_jawab',
		'tipe_akun',
		'akun_persediaan',
		'akun_retur_penjualan',
		'akun_diskon_penjualan',
		'akun_barang_terkirim',
		'akun_hpp',
		'akun_retur_pembelian',
		'akun_belum_tertagih',
		'status',
	];

}
