<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model {

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'kota',
        'propinsi',
        'telepon',
        'hp',
        'agama',
        'pendidikan_terakhir',
        'tahun_masuk',
        'id_jabatan',
        'gaji_pokok',
        'tunjangan1',
        'tunjangan2',
        'tunjangan3',
        'tunjangan4',
        'tunjangan5',
        'tunjangan6',
        'npwp',
        'status'
    ];

    protected $sales = 2;

    public function jabatan() {
        return $this->belongsTo('App\Jabatan', 'id_jabatan', 'id');
    }

    public function sales() {
        return $this->hasOne('App\Sales', 'id_karyawan', 'id');
    }

    public function scopeJabatSales($query) {
        return $query->where('id_jabatan', '=', $this->sales);
    }
}
