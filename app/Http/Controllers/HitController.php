<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Helpers\MobileDetect;
use App\Helpers\UserAgent;
use App\Hit;
use App\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Log;
use App\Device;

class HitController extends Controller {

	protected $uaParser;

	/**
	 * LeadController constructor.
	 */
	public function __construct() {
		$this->middleware( 'cors' );
		try {
			$this->uaParser = new UserAgent();
		} catch ( \Exception $exception ) {
			$this->uaParser = false;
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return array
	 */
	public function store( Request $request ) {
		if ( ! $this->validate_request( $request ) ) {
			return response( 'Not found.', 401 );
		}

		$lead = $this->update_lead_data( $request );
		if ( ! $lead ) {
			return response( 'Not found.', 401 );
		}

		$hit             = new Hit();
		$hit->session_id = $this->get_session_id( $request );
		$hit->agent_id   = $this->get_agent_id();
		$hit->device_id  = $this->get_device_id();

		//Get referer data
		//get domain data
		//get Geo IP data

		Log::debug( $hit );

		return [ 'status' => 'ok' ];
	}

	private function validate_request( $request ) {
		$required = [ 'lead_id', 'session_id', 'web_session' ];
		foreach ( $required as $field ) {
			if ( ! isset( $request[ $field ] ) ) {
				return false;
			}
		}

		return true;
	}

	private function update_lead_data( $request ) {
		$lead_id     = $request['lead_id'];
		$web_session = $request['web_session'] === 'true' ? true : false;

		if ( ! $lead_id ) {
			return false;
		}

		$lead = Lead::where( 'public_id', '=', $lead_id )->firstOrFail();

		if ( ! $lead ) {
			return false;
		}

		if ( $web_session ) {
			$lead->web_sessions ++;
		}

		$lead->last_seen = Carbon::now();

		return $lead->save();
	}

	private function get_session_id( $request ) {
		return $request['session_id'];
	}

	private function get_agent_id() {

		if ( ! $this->uaParser ) {
			return false;
		}

		$data = [
			'name'            => $this->uaParser->originalUserAgent ?: 'Other',
			'browser'         => $this->uaParser->userAgent->family,
			'browser_version' => $this->uaParser->getUserAgentVersion()
		];

		$agent = Agent::firstOrCreate( $data, [ 'name', 'browser', 'browser_version' ] );

		return $agent->id;

	}

	private function get_device_id() {
		$mobileDetect             = new MobileDetect();
		$data                     = $mobileDetect->detectDevice();
		$data['platform']         = $this->uaParser->operatingSystem->family;
		$data['platform_version'] = $this->uaParser->getOperatingSystemVersion();
		unset( $data['is_robot'] );

		Log::info( $data );

		$device = Device::firstOrCreate( $data, [ 'kind', 'model', 'platform', 'platform_version' ] );

		return $device->id;

	}

}
