<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'referers', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->bigInteger( 'domain_id' )->unsigned()->index();
			$table->string( 'url' )->index();
			$table->string( 'host' );
			$table->string('medium')->nullable()->index();
			$table->string('source')->nullable()->index();
			$table->string('search_terms_hash')->nullable()->index();
			$table->timestamp( 'created_at' )->index();
			$table->timestamp( 'updated_at' )->index();
		} );

		Schema::table( 'referers', function ( $table ) {
			$table->foreign( 'domain_id' )->references( 'id' )->on( 'domains' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'referers' );
	}
}
