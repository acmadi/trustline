<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model {

	protected $table = 'ordered_items';

	protected $fillable = [
		'id',
		'purchase_order_id',
		'requested_item_id',
		'kuantitas',
		'price',
		'discount',
		'tax'
	];

	public function requestedItem() {
		return $this->belongsTo('App\RequestedItem', 'requested_item_id', 'id');
	}

}
