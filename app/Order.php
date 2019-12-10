<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['name', 'phone_no','shipping_address'];
	
    public function user(){

    	return $this->belongsTo('App\User');
    }

    public function products(){
    	return $this->belongsToMany('App\Product')->withPivot('quantity');
    }

    public function payment(){
        return $this->belongsTo('App\Payment');
    }
}
