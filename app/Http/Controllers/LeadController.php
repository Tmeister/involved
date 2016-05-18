<?php

namespace App\Http\Controllers;

use App\Hit;
use App\Lead;
use App\Team;
use Auth;
use Illuminate\Http\Request;
use Log;
use Ramsey\Uuid\Uuid;
use Response;

class LeadController extends Controller {

	/**
	 * LeadController constructor.
	 */
	public function __construct() {
	}

	/**
	 * @param Request $request
	 *
	 * @return array|Response
	 */
	public function store( Request $request ) {
		$payload = json_decode( $request->getContent(), true );
		$app_id  = $payload['app_id'] ? $payload['app_id'] : false;

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

		if ( ! $teamId ) {
			return response( 'Team Not found.', 401 );
		}

		$data = Lead::with(
			'last_hit', 'last_hit.geo', 'last_hit.agent', 'last_hit.device', 'last_hit.referer',
			'first_hit', 'first_hit.geo', 'first_hit.agent', 'first_hit.device', 'first_hit.referer' )
		            ->select( 'id', 'public_id', 'last_seen' )
		            ->where( 'team_id', $teamId )
		            ->orderBy( 'last_seen', 'desc' )
		            ->paginate( 50 );

		return $data;
	}

	public function show( $lead_id ) {

		if ( empty( $lead_id ) ) {
			return response( 'Not lead found.', 401 );
		}

		$lead = Lead::where( 'public_id', $lead_id )->first();

		$hits = Hit::with( 'referer' )
		           ->where( 'lead_id', $lead->id )
		           ->orderBy( 'created_at', 'desc' )
		           ->get()
		           ->groupBy( function ( $hit ) {
			           return $hit->created_at->format( 'M d, Y' );
		           } );

		$totalHits = count( $hits );

		//$hits


		return [
			'total_hits' => $totalHits,
			'hits'       => $hits
		];

	}

}
