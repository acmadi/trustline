<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PoPr extends Model {

    public $timestamps = false;

    protected $fillable =[
        'id',
        'purchase_requisition_id',
        'purchase_order_id',
        'kuantitas',
        'price',
        'discount',
        'tax',
    ];
}
