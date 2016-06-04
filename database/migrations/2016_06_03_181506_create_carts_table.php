<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'carts', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->bigInteger( 'lead_id' )->unsigned()->index();
			$table->string( 'hash' )->index();
			$table->decimal( 'total', 10, 2 )->unsigned();
			$table->enum( 'status', [ 'active', 'abandoned', 'recovered' ] )->default( 'active' )->index();
			$table->timestamps();
		} );

		Schema::table( 'carts', function ( $table ) {
			$table->foreign( 'lead_id' )->references( 'id' )->on( 'leads' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'carts' );
	}
}
