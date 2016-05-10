<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model {

	protected $fillable = array('team_id', 'public_id');

	public function team(){
		return $this->belongsTo('App\Team');
	}

	public function hit(){
		return $this->hasMany('App\Hit');
	}
}
