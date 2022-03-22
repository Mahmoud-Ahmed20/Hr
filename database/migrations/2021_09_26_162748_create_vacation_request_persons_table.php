<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVacationRequestPersonsTable extends Migration {

	public function up()
	{
		Schema::create('vacation_request_persons', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('name_id');
			$table->smallInteger('age');
			$table->smallInteger('person_id');
			$table->integer('vacation_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('vacation_request_persons');
	}
}