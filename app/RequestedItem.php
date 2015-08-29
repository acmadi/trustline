<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestedItem extends Model {

	protected $table = 'requested_items';
	protected $guarded = [];

	public function barang() {
		return $this->belongsTo('App\Barang');
	}

	public function purchaseRequisition() {
		return $this->belongsTo('App\PurchaseRequisition');
	}

}
