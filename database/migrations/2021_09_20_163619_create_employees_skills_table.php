<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesSkillsTable extends Migration {

	public function up()
	{
		Schema::create('employees_skills', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('skills', 200)->nullable();
			$table->integer('employe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_skills');
	}
}