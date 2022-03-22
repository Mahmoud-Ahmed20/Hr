<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffDrivingLicenceTable extends Migration {

	public function up()
	{
		Schema::create('staff_driving_licence', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('category', 40);
			$table->bigInteger('number');
			$table->date('date_of_issue');
			$table->string('place_of_issue', 30);
			$table->date('expiry_date');
			$table->string('blood_group', 5);
			$table->integer('staff_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('staff_driving_licence');
	}
}