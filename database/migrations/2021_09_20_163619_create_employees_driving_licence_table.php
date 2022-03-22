<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesDrivingLicenceTable extends Migration {

	public function up()
	{
		Schema::create('employees_driving_licence', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('number', 30)->nullable();
			$table->string('expiry_date', 20)->nullable();
			$table->string('blood_group', 4)->nullable();
			$table->integer('category')->unsigned()->nullable();
			$table->string('date_of_issue', 20)->nullable();
			$table->string('place_of_issue', 30)->nullable();
			$table->integer('employe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_driving_licence');
	}
}