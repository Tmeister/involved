<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemoteItemId extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'items', function ( Blueprint $table ) {
			$table->bigInteger( 'remote_id' )->unsigned();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'items', function ( Blueprint $table ) {
			$table->dropColumn( 'remote_id' );
		} );
	}
}
