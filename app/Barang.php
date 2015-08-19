<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model {

	public $incrementing = false;

	public $timestamps = false;

	protected $fillable = [
		'id',
		'tipebarang',
		'barkode',
		'nama',
		'satuan',
		'kuantitas',
		'harga_jual1',
		'harga_jual2',
		'harga_jual3',
		'harga_jual4',
		'harga_jual5',
		'saldo_minimum',
		'status',
		'kontrol_satuan',
		'kontrol_kuantitas',
		'catatan'
	];

	public function gambar() {
		return $this->belongsTo('App\File', 'gambar_id', 'id');
	}

}
