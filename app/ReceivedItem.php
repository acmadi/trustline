<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivedItem extends Model {

	protected $table = 'received_items';

	protected $fillable = [
		'id',
		'receive_order_id',
		'ordered_item_id',
		'kuantitas',
		'gudang_id',
		'batch_id'
	];

}
