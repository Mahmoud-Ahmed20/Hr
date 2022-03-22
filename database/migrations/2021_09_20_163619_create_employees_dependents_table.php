<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesDependentsTable extends Migration {

	public function up()
	{
		Schema::create('employees_dependents', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 30)->nullable();
			$table->string('age', 5)->nullable();
			$table->string('relation', 20)->nullable();
			$table->string('address', 150)->nullable();
			$table->integer('employe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_dependents');
	}
}