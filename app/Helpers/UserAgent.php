<?php


namespace App\Helpers;

use UAParser\Parser;

class UserAgent {

	public $parser;
	public $userAgent;
	public $operatingSystem;
	public $device;
	public $originalUserAgent;

	public function __construct( $userAgent = null ) {
		if ( ! $userAgent && isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$userAgent = $_SERVER['HTTP_USER_AGENT'];
		}
		$this->parser            = Parser::create()->parse( $userAgent );
		$this->userAgent         = $this->parser->ua;
		$this->operatingSystem   = $this->parser->os;
		$this->device            = $this->parser->device;
		$this->originalUserAgent = $this->parser->originalUserAgent;
	}

	public function getOperatingSystemVersion() {
		return $this->operatingSystem->major .
		       ( $this->operatingSystem->minor !== null ? '.' . $this->operatingSystem->minor : '' ) .
		       ( $this->operatingSystem->patch !== null ? '.' . $this->operatingSystem->patch : '' );
	}

	public function getUserAgentVersion() {
		return $this->userAgent->major .
		       ( $this->userAgent->minor !== null ? '.' . $this->userAgent->minor : '' ) .
		       ( $this->userAgent->patch !== null ? '.' . $this->userAgent->patch : '' );
	}
}