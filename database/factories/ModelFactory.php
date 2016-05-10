<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define( App\User::class, function ( Faker\Generator $faker ) {
	return [
		'name'           => $faker->name,
		'email'          => $faker->safeEmail,
		'password'       => bcrypt( str_random( 10 ) ),
		'remember_token' => str_random( 10 ),
	];
} );

$factory->define( App\Lead::class, function ( Faker\Generator $faker ) {
	return [
		'team_id'        => 1,
		'region'         => $faker->city,
		'country'        => $faker->country,
		'city'           => $faker->city
	];
} );

$factory->define( App\Hit::class, function ( Faker\Generator $faker ) {
	return [
		'lead_id' => 5,
		'session_id'=> '000000005',
		'url' => $faker->url,
		'browser' => 'Chrome',
		'browser_version' => '50.0.0.1',
		'os' => 'Mac OS',
		'os_version' => 'X',
		'device' => '',
		'ip' => $faker->ipv4
	];
} );


