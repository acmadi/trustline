<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangPo extends Model {


    public $timestamps = false;

	protected $fillable = [
        'id',
        'barang_id',
        'purchase_requisition_id',
        'kuantitas',
        'kuantitas_sekarang',
        'tanggal_butuh',
        'catatan',
    ];
}
