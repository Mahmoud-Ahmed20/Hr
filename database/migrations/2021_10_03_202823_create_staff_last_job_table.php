<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffLastJobTable extends Migration {

	public function up()
	{
		Schema::create('staff_last_job', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('from');
			$table->date('to');
			$table->string('job_title', 30);
			$table->mediumInteger('bisic_salary');
			$table->mediumInteger('allowance');
			$table->string('company_name', 40);
			$table->string('reason_for_leaving', 200);
			$table->string('description_for_your_duties', 200);
			$table->string('address', 200);
			$table->string('phone', 20);
			$table->integer('staff_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('staff_last_job');
	}
}