<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentitiesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'identities', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->bigInteger( 'lead_id' )->unsigned();
			$table->char( 'email' );
			$table->string( 'first_name', 50 )->nullable();
			$table->string( 'last_name', 50 )->nullable();
			$table->string( 'company', 50 )->nullable();
			$table->string( 'country', 50 )->nullable();
			$table->string( 'state', 50 )->nullable();
			$table->string( 'city', 50 )->nullable();
			$table->char( 'address_1' )->nullable();
			$table->char( 'address_2' )->nullable();
			$table->string( 'postcode', 15 )->nullable();
			$table->string( 'phone', 15 )->nullable();
			$table->timestamps();
		} );

		Schema::table( 'identities', function ( $table ) {
			$table->foreign( 'lead_id' )->references( 'id' )->on( 'leads' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'identities' );
	}
}
