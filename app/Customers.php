<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model {

	public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'kota',
        'kode_pos',
        'propinsi',
        'negara',
        'telepon1',
        'telepon2',
        'email',
        'contact_person',
        'telepon1_cp',
        'telepon2_cp',
        'email_cp',
        'npwp',
        'web',
        'no_pkp',
        'bank_kerja_1',
        'bank_kerja_2',
        'bank_kerja_3',
        'bank_kerja_4',
        'dpp',
        'pajak1',
        'sub_total_pajak_1',
        'pajak2',
        'sub_total_pajak_2',
        'total_piutang',
        'plafon_harga',
        'plafon_hari',
        'tahun_bergabung',
        'sales_id',
        'status'
    ];
}
