<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model {

	//
    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'kontak',
        'manajer',
        'tanggal_mulai',
        'tanggal_selesai',
        'komplit',
        'pelanggan'
    ];
}
