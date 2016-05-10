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
}