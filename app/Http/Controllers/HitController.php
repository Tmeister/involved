<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Domains;
use App\Geoip;
use App\Helpers\MobileDetect;
use App\Helpers\UserAgent;
use App\Hit;
use App\Lead;
use App\Referer;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Log;
use App\Device;
use GeoIP2;

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
		if ( ! $this->validateRequest( $request ) ) {
			return response( 'Not found.', 401 );
		}

		$lead_id = $this->updateLeadData( $request );
		if ( ! $lead_id ) {
			return response( 'Not found.', 401 );
		}

		$hit             = new Hit();
		$hit->lead_id    = $lead_id;
		$hit->session_id = $this->getSessionId( $request );
		$hit->agent_id   = $this->getAgentId();
		$hit->device_id  = $this->getDeviceId();
		$hit->referer_id = $this->getRefererId( $request->headers->get( 'referer' ) );
		$hit->geoip_id   = $this->getGeoIpId();
		//get Geo IP data
		try {
			$hit->save();

			return [
				'status' => 200,
				'error'  => false,
				'hit'    => $hit
			];
		} catch ( Exception $e ) {
			return [
				'status'  => 500,
				'error'   => true,
				'message' => $e->getMessage()
			];
		}


	}

	private function validateRequest( $request ) {
		$required = [ 'lead_id', 'session_id', 'web_session' ];
		foreach ( $required as $field ) {
			if ( ! isset( $request[ $field ] ) ) {
				return false;
			}
		}

		return true;
	}

	private function updateLeadData( Request $request ) {
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

		$lead->save();

		return $lead->id;
	}

	private function getSessionId( Request $request ) {
		return $request['session_id'];
	}

	private function getAgentId() {

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

	private function getDeviceId() {
		$mobileDetect             = new MobileDetect();
		$data                     = $mobileDetect->detectDevice();
		$data['platform']         = $this->uaParser->operatingSystem->family;
		$data['platform_version'] = $this->uaParser->getOperatingSystemVersion();
		unset( $data['is_robot'] );

		$device = Device::firstOrCreate( $data, [ 'kind', 'model', 'platform', 'platform_version' ] );

		return $device->id;

	}

	private function getRefererId( $referer ) {
		$url    = parse_url( $referer );
		$parts  = explode( ".", $url['host'] );
		$domain = array_pop( $parts );

		if ( sizeof( $parts ) > 0 ) {
			$domain = array_pop( $parts ) . "." . $domain;
		}

		$domainId = $this->getDomainId( $domain );

		$data = [
			'domain_id' => $domainId,
			'url'       => $referer,
			'host'      => $url['host'],
		];

		$referer = Referer::firstOrCreate( $data, [ 'domain_id', 'url', 'host' ] );

		return $referer->id;

	}

	private function getDomainId( $domain ) {
		$domain = Domains::firstOrCreate( [ 'name' => $domain ], [ 'name' ] );

		return $domain->id;
	}

	private function getGeoIpId() {
		$geo = GeoIP2::getLocation();

		$data = [
			'latitude'     => $geo['lat'],
			'longitude'    => $geo['lon'],
			'country_code' => $geo['isoCode'],
			'country_name' => $geo['country'],
			'region'       => $geo['state'],
			'city'         => $geo['city'],
			'postal_code'  => $geo['postal_code']
		];

		$newGeo = Geoip::firstOrCreate( $data, [
			'latitude',
			'longitude',
			'country_code',
			'country_name',
			'region',
			'city',
			'postal_code'
		] );

		return $newGeo->id;
	}

}
