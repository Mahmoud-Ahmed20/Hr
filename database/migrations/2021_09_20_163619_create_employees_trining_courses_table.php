<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTriningCoursesTable extends Migration {

	public function up()
	{
		Schema::create('employees_trining_courses', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name_of_institute', 30)->nullable();
			$table->string('country', 20)->nullable();
			$table->string('city', 20)->nullable();
			$table->string('from', 15)->nullable();
			$table->string('to', 15)->nullable();
			$table->string('specialize', 30)->nullable();
			$table->integer('employe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_trining_courses');
	}
}