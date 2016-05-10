<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referer extends Model {

	protected $fillable = ['domain_id', 'url', 'host'];

}
