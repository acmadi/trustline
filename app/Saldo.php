<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model {

    protected $fillable = [
        'gudang_id',
        'nomor_bukti',
        'kuantitas',
        'hpp_satuan',
        'tanggal',
        'batch_id'
    ];

    public $timestamps = false;
}
