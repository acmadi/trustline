<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SyaratPembayaran extends Model {

	protected $fillable = [
        'id',
        'nama',
        'syarat_diskon',
        'diskon',
        'jatuh_tempo'
    ];

}
