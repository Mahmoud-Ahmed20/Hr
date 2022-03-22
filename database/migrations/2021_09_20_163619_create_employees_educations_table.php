<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesEducationsTable extends Migration {

	public function up()
	{
		Schema::create('employees_educations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('place_name', 30)->nullable();
			$table->string('country', 20)->nullable();
			$table->string('city', 20)->nullable();
			$table->string('from', 15)->nullable();
			$table->string('to', 15)->nullable();
			$table->string('specialize', 40)->nullable();
			$table->string('grade', 10)->nullable();
			$table->integer('employe_id')->unsigned();
			$table->integer('stage_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_educations');
	}
}