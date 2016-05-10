<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteGeoipFields extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'geoips', function ( Blueprint $table ) {
			$table->dropColumn( 'country_code3' );
			$table->dropColumn( 'area_code' );
			$table->dropColumn( 'dma_code' );
			$table->dropColumn( 'metro_code' );
			$table->dropColumn( 'continent_code' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}
}
