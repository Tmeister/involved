<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

	protected $fillable = [ 'lead_id', 'hash', 'total', 'status' ];

	public function items() {
		return $this->hasMany( Item::class );
	}

}
