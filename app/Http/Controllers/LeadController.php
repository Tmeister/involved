<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Team;
use Illuminate\Http\Request;

use App\Http\Requests;
use Log;
use Ramsey\Uuid\Uuid;

class LeadController extends Controller {

	/**
	 * LeadController constructor.
	 */
	public function __construct() {
		$this->middleware( 'cors' );
	}

	public function store( Request $request ) {
		$app_id = $request['app_id'] ? $request['app_id'] : false;

		if ( ! $app_id ) {
			return response( 'Not found.', 401 );
		}

		$team = Team::where( 'public_id', '=', $app_id )->firstOrFail();

		if ( ! $team ) {
			return response( 'Not found.', 401 );
		}

		Log::debug( $team );
		Log::debug( $team->id );

		$lead = Lead::create( [
			'team_id'   => $team->id,
			'public_id' => Uuid::uuid4()
		] );

		return [
			'status' => 200,
			'error'  => false,
			'leadId' => $lead->public_id
		];

	}

}
