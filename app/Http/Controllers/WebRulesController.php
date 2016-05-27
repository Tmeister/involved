<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WebRulesController extends Controller {

	/**
	 * Create a new controller instance.
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 */
	public function show() {
		return view( 'webrules' );
	}

}
