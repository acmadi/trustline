<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequisition extends Model {

	protected $table = 'purchaserequisitions';

	public $timestamps = false;

	protected $fillable =[
		'tanggal',
		'catatan',
	];

	public function barangs() {
		return $this
			->belongsToMany('App\Barang', 'requested_items', 'purchase_requisition_id', 'barang_id')
			->withPivot([
				'id',
				'kuantitas',
				'satuan',
				'kuantitas_ordered',
				'kuantitas_received',
				'tanggal_butuh',
				'catatan'
			])
			->withTimestamps();
	}

}
