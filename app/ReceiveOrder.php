<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveOrder extends Model {

	protected $table = 'receive_orders';

	protected $fillable = [
		'id',
		'supplier_id',
		'form_no',
		'tanggal',
		'ship_date',
		'fob',
		'catatan'
	];

	public function receivedItems() {
		return $this
			->belongsToMany('App\RequestedItem', 'received_items', 'received_order_id', 'ordered_item_id')
			->withPivot([
				'id',
				'kuantitas',
				'price',
				'discount',
				'tax'
			]);
	}
}
