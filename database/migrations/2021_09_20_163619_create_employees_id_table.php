<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesIdTable extends Migration {

	public function up()
	{
		Schema::create('employees_id', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('card_id', 40)->nullable();
			$table->string('place_of_issue', 20)->nullable();
			$table->string('date_of_issue', 20)->nullable();
			$table->integer('employe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_id');
	}
}