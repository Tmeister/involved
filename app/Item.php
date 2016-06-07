<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	protected $fillable = [ 'cart_id', 'name', 'img_path', 'quantity', 'price', 'remote_id' ];

	public function cart() {
		return $this->belongsTo( Cart::class );
	}
	
}
