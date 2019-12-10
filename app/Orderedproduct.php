<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderedproduct extends Model
{
    protected $table = 'orderedproducts';

    protected $fillable = ['order_id','product_id', 'quantity'];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
