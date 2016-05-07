<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHitsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'hits', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->integer( 'lead_id' )->unsigned();
			$table->char( 'session_id', 32 );
			$table->string( 'url' );
			$table->string( 'browser' );
			$table->string( 'browser_version' );
			$table->string( 'os' );
			$table->string( 'os_version' );
			$table->string( 'device' );
			$table->ipAddress( 'ip' );
			$table->timestamps();
		} );

		Schema::table('hits', function($table) {
			$table->foreign( 'lead_id' )->references( 'id' )->on( 'leads' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'hits' );
	}
}
