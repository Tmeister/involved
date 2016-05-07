<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model {
	public function lead(){
		return $this->belongsTo('App\Lead');
	}
}
