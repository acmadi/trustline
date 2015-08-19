<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model {

	protected $table = 'purchaseorders';

	public $timestamps = false;

	protected $fillable = [
		'id',
		'supplier_id',
		'ship_to',
		'fob',
		'tanggal',
		'expected_date',
		'syaratpembayaran_id',
		'freight',
		'catatan',
		'akun_dp',
		'discount'
	];

	public function requestedItems() {
		return $this
			->belongsToMany('App\RequestedItem', 'ordered_items', 'purchase_order_id', 'requested_item_id')
			->withPivot([
				'id',
				'kuantitas',
				'price',
				'discount',
				'tax'
			]);
	}

	public function orderedItems() {
		return $this
			->hasMany('App\OrderedItem', 'purchase_order_id', 'id');
	}

	public function supplier() {
		return $this->belongsTo('App\Supplier', 'supplier_id', 'id');
	}

	public function term() {
		return $this->belongsTo('App\SyaratPembayaran', 'syaratpembayaran_id', 'id');
	}

	public function akunDP() {
		return $this->belongsTo('App\Akun', 'akun_dp', 'no_akun');
	}
}
