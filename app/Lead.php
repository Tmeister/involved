<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model {

	public function team(){
		return $this->belongsTo('App\Team');
	}

	public function lead(){
		return $this->hasMany('App\Lead');
	}
}
