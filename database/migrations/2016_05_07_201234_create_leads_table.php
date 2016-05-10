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
			$table->bigIncrements( 'id' );
			$table->integer( 'team_id' )->unsigned();
			$table->string( 'public_id' )->unique(); //Uuid::uuid4()
			$table->integer( 'web_sessions' )->default( 1 );
			$table->timestamp( 'last_seen' )->useCurrent();
			$table->timestamp( 'last_contacted' );
			$table->boolean( 'is_converted' )->default( 0 );
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
