<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesCompanyPreviousTable extends Migration {

	public function up()
	{
		Schema::create('employees_company_previous', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('from', 15)->nullable();
			$table->string('to', 15)->nullable();
			$table->string('name_of_org', 30)->nullable();
			$table->string('address', 150)->nullable();
			$table->string('telephone', 20)->nullable();
			$table->string('job_title', 30)->nullable();
			$table->string('description', 150)->nullable();
			$table->string('salary')->nullable();
			$table->string('allowance', 20)->nullable();
			$table->string('reason_for_quit', 150)->nullable();
			$table->integer('employe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_company_previous');
	}
}