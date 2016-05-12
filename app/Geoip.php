<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geoip extends Model {

	protected $fillable = [
		'latitude',
		'longitude',
		'country_code',
		'country_name',
		'region',
		'city',
		'postal_code'
	];

	public function hits() {
		return $this->belongsTo( Hit::class, 'id', 'geoip_id' );
	}
}