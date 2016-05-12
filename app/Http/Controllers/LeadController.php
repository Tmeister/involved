<?php

namespace App\Http\Controllers;

use App\Hit;
use App\Lead;
use App\Team;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Laravel\Spark\Spark;
use Request;

use Log;
use Ramsey\Uuid\Uuid;
use Response;

class LeadController extends Controller {

	/**
	 * LeadController constructor.
	 */
	public function __construct() {
		$this->middleware( 'cors' );
	}

	/**
	 * @param Request $request
	 *
	 * @return array|Response
	 */
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

	public function index( Request $request ) {
		$teamId = Auth::user()->currentTeam()->id;
		$leads  = Lead::with( 'first_hit', 'first_hit.geo', 'first_hit.agent', 'first_hit.device' )
		              ->select( 'id', 'public_id', 'last_seen' )
		              ->where( 'team_id', $teamId )
		              ->orderBy( 'last_seen', 'desc' )
		              ->take( 50 )
		              ->get();

		return [
			'count' => count( $leads ),
			'leads' => $leads
		];
	}

}
