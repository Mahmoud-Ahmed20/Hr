<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesRelativesEmployedTable extends Migration {

	public function up()
	{
		Schema::create('employees_relatives_employed', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 30)->nullable();
			$table->integer('employe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_relatives_employed');
	}
}