<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model {

	protected $fillable = [
        'nama',
        'nilai',
        'keterangan',
        'akun_pajak_penjualan',
        'akun_pajak_pembelian'
    ];

}
