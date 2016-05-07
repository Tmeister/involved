<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'leads', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'team_id' )->unsigned();
			$table->string( 'first_name' )->nullable();
			$table->string( 'last_name' )->nullable();
			$table->string( 'email' )->nullable();
			$table->integer( 'web_sessions' )->default( 1 );
			$table->string( 'region' )->nullable();
			$table->string( 'country' )->nullable();
			$table->string( 'city' )->nullable();
			$table->timestamp( 'last_seen' )->nullable();
			$table->timestamp( 'last_contacted' );
			$table->boolean( 'is_converted' );
			$table->timestamps();
		} );

		Schema::table( 'leads', function ( $table ) {
			$table->foreign( 'team_id' )->references( 'id' )->on( 'teams' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'leads' );
	}
}
