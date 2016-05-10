<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

	protected $fillable = ['kind', 'model', 'platform', 'platform_version'];

}
