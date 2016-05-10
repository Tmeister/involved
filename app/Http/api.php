<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group( [
	'prefix'     => 'api',
	'middleware' => 'auth:api'
], function () {

	Route::get( 'test', function () {
		return [ 'name' => 'Tmeister' ];
	} );

	Route::resource(
		'lead',
		'LeadController',
		[ 'only' => [ 'show', 'store' ] ] );

	Route::resource(
		'hit',
		'HitController',
		[ 'only' => [ 'show', 'store' ] ] );

} );
