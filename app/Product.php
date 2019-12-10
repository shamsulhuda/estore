<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function wishlists(){
    	return $this->hasMany('App\Wishlist');
    }

    public function orders(){
    	return $this->hasMany('App\Orderedproduct');
    }
}
