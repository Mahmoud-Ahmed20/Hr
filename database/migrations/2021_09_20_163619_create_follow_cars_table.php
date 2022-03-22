<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowCarsTable extends Migration {

	public function up()
	{
		Schema::create('follow_cars', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('car_type', 30);
			$table->string('plate_number', 20);
			$table->string('color', 25);
			$table->string('model', 25);
			$table->string('owner_name', 40);
			$table->string('license_expiration', 15);
			$table->string('insurance_expiry', 15);
			$table->string('driving_auth_expiry_1', 15);
			$table->string('driving_auth_expiry_2', 15);
			$table->string('driver_name', 40);
            $table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('follow_cars');
	}
}
