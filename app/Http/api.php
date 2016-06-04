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
	'middleware' => [ 'cors', 'auth:api' ]
], function () {

	Route::get( 'test', function () {
		return [ 'name' => 'Tmeister' ];
	} );

	Route::resource(
		'lead',
		'LeadController',
		[ 'only' => [ 'index', 'show', 'store' ] ] );

	Route::resource(
		'hit',
		'HitController',
		[ 'only' => [ 'index', 'show', 'store' ] ] );

	Route::resource(
		'cart',
		'CartController',
		[ 'only' => [ 'store' ] ] );

} );
