<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobMissionRequestsTable extends Migration {

	public function up()
	{
		Schema::create('job_mission_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('location', 20);
			$table->integer('Staff_id');
			$table->string('number', 20);
			$table->date('date');
			$table->string('job_title', 40);
			$table->integer('administration_id');
			$table->integer('section_id');
			$table->string('direction_of_the_mission', 60);
			$table->smallInteger('duration_of_mission');
			$table->date('date_from');
			$table->date('date_to');
			$table->string('mission_specification', 500);
			$table->smallInteger('expense_advance');
			$table->string('ticket', 100);
			$table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('job_mission_requests');
	}
}
