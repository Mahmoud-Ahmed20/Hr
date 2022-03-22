<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffsTable extends Migration {

	public function up()
	{
		Schema::create('staffs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->bigInteger('id_number');
			$table->integer('job_id');
			$table->integer('section_id');
			$table->integer('nationality_id');
			$table->date('date_of_birth');
			$table->string('religion', 20);
			$table->string('marital_status', 15);
			$table->string('present_adderss', 200);
			$table->string('post', 20);
			$table->string('mobile', 20);
			$table->string('home_phone', 20);
			$table->tinyInteger('salary_system');
			$table->tinyInteger('have_you_any_dependents');
			$table->string('dependents_address', 300);
			$table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('staffs');
	}
}
