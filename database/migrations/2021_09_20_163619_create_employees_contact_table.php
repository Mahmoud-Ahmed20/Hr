<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesContactTable extends Migration {

	public function up()
	{
		Schema::create('employees_contact', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('mobile', 20)->nullable();
			$table->string('email', 40)->nullable();
			$table->string('post', 40)->nullable();
			$table->string('home_phone', 30)->nullable();
			$table->string('work_phone', 20)->nullable();
			$table->string('present_adderss', 100)->nullable();
			$table->integer('employe_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('employees_contact');
	}
}