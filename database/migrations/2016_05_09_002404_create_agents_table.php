<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'agents', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->string( 'name' )->unique();
			$table->string( 'browser' )->index();
			$table->string( 'browser_version' );
			$table->timestamp( 'created_at' )->index();
			$table->timestamp( 'updated_at' )->index();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'agents' );
	}
}
