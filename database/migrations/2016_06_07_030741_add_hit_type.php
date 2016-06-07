<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHitType extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'hits', function ( Blueprint $table ) {
			$table->enum( 'type',
				[ 'page_view', 'cart_view', 'checkout_view', 'item_added', 'item_removed', 'order_receive' ] )
			      ->default( 'page_view' )->index();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'hits', function ( Blueprint $table ) {
			$table->dropColumn('type'); 
		} );
	}
}
