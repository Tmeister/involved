<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

class Team extends SparkTeam {

	public function leads() {
		return $this->hasMany( 'App\Lead' );
	}
}
