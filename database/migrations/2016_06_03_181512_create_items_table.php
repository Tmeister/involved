<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'items', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->bigInteger( 'cart_id' )->unsigned()->index();
			$table->string( 'name' );
			$table->decimal( 'price', 10, 2 )->unsigned();
			$table->string( 'img_path' )->nullable();
			$table->integer( 'quantity' )->unsigned();
			$table->timestamps();
		} );

		Schema::table( 'items', function ( $table ) {
			$table->foreign( 'cart_id' )->references( 'id' )->on( 'carts' )
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
		Schema::drop( 'items' );
	}
}
