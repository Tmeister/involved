<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoipsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'geoips', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->double( 'latitude' )->nullable()->index();
			$table->double( 'longitude' )->nullable()->index();
			$table->string( 'country_code', 2 )->nullable()->index();
			$table->string( 'country_code3', 3 )->nullable()->index();
			$table->string( 'country_name' )->nullable()->index();
			$table->string( 'region', 2 )->nullable();
			$table->string( 'city', 50 )->nullable()->index();
			$table->string( 'postal_code', 20 )->nullable();
			$table->bigInteger( 'area_code' )->nullable();
			$table->double( 'dma_code' )->nullable();
			$table->double( 'metro_code' )->nullable();
			$table->string( 'continent_code', 2 )->nullable();
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
		Schema::drop( 'geoips' );
	}
}
