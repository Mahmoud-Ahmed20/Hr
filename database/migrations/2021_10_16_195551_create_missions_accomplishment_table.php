<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMissionsAccomplishmentTable extends Migration {

	public function up()
	{
		Schema::create('missions_accomplishment', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('staff_id')->unsigned();
			$table->string('number', 30);
			$table->date('work_date');
			$table->integer('section_id')->unsigned();
			$table->integer('job_id')->unsigned();
			$table->integer('administration_id')->unsigned();
			$table->string('duration_of_mission', 20);
			$table->string('direction_of_the_mission', 50);
			$table->date('start_working_at');
			$table->date('leaving_date');
			$table->string('mission_details', 500);
			$table->string('results', 500);
			$table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('missions_accomplishment');
	}
}