<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'devices', function ( Blueprint $table ) {
			$table->bigIncrements( 'id' );
			$table->string( 'kind', 16 )->index();
			$table->string( 'model', 64 )->index();
			$table->string( 'platform', 64 )->index();
			$table->string( 'platform_version', 16 )->index();
			$table->boolean( 'is_mobile' );
			$table->unique( [ 'kind', 'model', 'platform', 'platform_version' ] );
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
		Schema::drop( 'devices' );
	}
}
