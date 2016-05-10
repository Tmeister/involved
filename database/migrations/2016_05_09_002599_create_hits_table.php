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
			$table->bigInteger( 'lead_id' )->unsigned();
			$table->char( 'session_id', 32 );
			$table->bigInteger( 'device_id' )->unsigned()->nullable()->index();
			$table->bigInteger( 'agent_id' )->unsigned()->nullable()->index();
			$table->string( 'client_ip' )->index();
			$table->bigInteger( 'referer_id' )->unsigned()->nullable()->index();
			$table->bigInteger( 'geoip_id' )->unsigned()->nullable()->index();
			$table->boolean( 'is_robot' );
			$table->timestamp( 'created_at' )->index();
			$table->timestamp( 'updated_at' )->index();
		} );

		Schema::table( 'hits', function ( $table ) {
			$table->foreign( 'lead_id' )->references( 'id' )->on( 'leads' )
			      ->onUpdate( 'cascade' )
			      ->onDelete( 'cascade' );

			$table->foreign( 'device_id' )->references( 'id' )->on( 'devices' )
			      ->onUpdate( 'cascade' )
			      ->onDelete( 'cascade' );

			$table->foreign( 'agent_id' )->references( 'id' )->on( 'agents' )
			      ->onUpdate( 'cascade' )
			      ->onDelete( 'cascade' );

			$table->foreign( 'referer_id' )->references( 'id' )->on( 'referers' )
			      ->onUpdate( 'cascade' )
			      ->onDelete( 'cascade' );

			$table->foreign( 'geoip_id' )->references( 'id' )->on( 'geoips' )
			      ->onUpdate( 'cascade' )
			      ->onDelete( 'cascade' );
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
