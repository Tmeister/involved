<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model {

	public function lead() {
		return $this->belongsTo( Lead::class, 'lead_id', 'id' );
	}

	public function geo() {
		return $this->hasOne( Geoip::class, 'id', 'geoip_id' )
		            ->select( 'id', 'latitude', 'longitude', 'country_code', 'country_name', 'region', 'city',
			            'postal_code' );
	}

	public function device() {
		return $this->hasOne( Device::class, 'id', 'device_id' )
		            ->select( 'id', 'kind', 'model', 'platform', 'platform_version', 'is_mobile' );
	}

	public function agent() {
		return $this->hasOne( Agent::class, 'id', 'agent_id' )
		            ->select( 'id', 'browser', 'browser_version' );
	}

	public function referer() {
		return $this->hasOne( Referer::class, 'id', 'referer_id' );
	}
}
