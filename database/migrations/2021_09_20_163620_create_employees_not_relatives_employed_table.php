<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesNotRelativesEmployedTable extends Migration {

	public function up()
	{
		Schema::create('employees_not_relatives_employed', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 30)->nullable();
			$table->string('position', 20)->nullable();
			$table->string('company', 30)->nullable();
			$table->string('telephone', 20)->nullable();
			$table->string('address', 150)->nullable();
			$table->integer('employe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_not_relatives_employed');
	}
}