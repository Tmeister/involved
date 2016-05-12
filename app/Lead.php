<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model {

	protected $fillable = array( 'team_id', 'public_id' );

	public function team() {
		return $this->belongsTo( Team::class );
	}

	public function hits() {
		return $this->hasMany( Hit::class );
	}

	public function first_hit() {
		return $this->hasOne( Hit::class )
		            ->select( 'id', 'lead_id', 'device_id', 'agent_id', 'referer_id', 'geoip_id' )
		            ->orderBy( 'id', 'desc' );
	}
}
