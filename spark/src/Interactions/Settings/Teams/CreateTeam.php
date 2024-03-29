<?php

namespace Laravel\Spark\Interactions\Settings\Teams;

use Laravel\Spark\Contracts\Repositories\TokenRepository;
use Laravel\Spark\Spark;
use Illuminate\Support\Facades\Validator;
use Laravel\Spark\Events\Teams\TeamCreated;
use Laravel\Spark\Contracts\Repositories\TeamRepository;
use Laravel\Spark\Contracts\Interactions\Settings\Teams\CreateTeam as Contract;
use Laravel\Spark\Contracts\Interactions\Settings\Teams\AddTeamMember as AddTeamMemberContract;

class CreateTeam implements Contract {
	/**
	 * {@inheritdoc}
	 */
	public function validator( $user, array $data ) {
		$validator = Validator::make( $data, [
			'name' => 'required',
		] );

		$validator->after( function ( $validator ) use ( $user ) {
			$this->validateMaximumTeamsNotExceeded( $validator, $user );
		} );

		return $validator;
	}

	/**
	 * Validate that the maximum number of teams hasn't been exceeded.
	 *
	 * @param  \Illuminate\Validation\Validator $validator
	 * @param  \Illuminate\Contracts\Auth\Authenticatable $user
	 *
	 * @return void
	 */
	protected function validateMaximumTeamsNotExceeded( $validator, $user ) {
		if ( ! $plan = $user->sparkPlan() ) {
			return;
		}

		if ( is_null( $plan->teams ) ) {
			return;
		}

		if ( $plan->teams <= $user->ownedTeams()->count() ) {
			$validator->errors()->add( 'name', 'Please upgrade your subscription to create more teams.' );
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function handle( $user, array $data ) {
		event( new TeamCreated( $team = Spark::interact(
			TeamRepository::class . '@create', [ $user, $data ]
		) ) );

		Spark::interact( AddTeamMemberContract::class, [
			$team,
			$user,
			'owner'
		] );

		Spark::interact( TokenRepository::class . '@createToken', [
			$user,
			'public_client'
		] );

		return $team;
	}
}
