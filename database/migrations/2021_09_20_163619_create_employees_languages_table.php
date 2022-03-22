<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesLanguagesTable extends Migration {

	public function up()
	{
		Schema::create('employees_languages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('speaking')->nullable();
			$table->integer('reading')->nullable();
			$table->integer('writing')->nullable();
			$table->string('shorthand_speed', 5)->nullable();
			$table->string('typing_speed', 5)->nullable();
			$table->string('other_skills', 200)->nullable();
			$table->integer('employe_id')->unsigned();
			$table->integer('lang_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_languages');
	}
}