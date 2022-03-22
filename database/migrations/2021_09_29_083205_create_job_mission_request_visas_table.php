<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobMissionRequestVisasTable extends Migration {

	public function up()
	{
		Schema::create('job_mission_request_visas', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 40);
			$table->integer('job_mission_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('job_mission_request_visas');
	}
}