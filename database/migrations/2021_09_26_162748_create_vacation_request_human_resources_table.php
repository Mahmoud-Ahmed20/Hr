<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVacationRequestHumanResourcesTable extends Migration {

	public function up()
	{
		Schema::create('vacation_request_human_resources', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('previous_return_date');
			$table->smallInteger('paid_leave');
			$table->smallInteger('unpaid_leave');
			$table->smallInteger('unpaid_leave_per_year');
			$table->smallInteger('holidays');
			$table->string('notes_tow', 200)->nullable();
			$table->tinyInteger('is_the_passport_valid');
			$table->tinyInteger('cover_the_duration_of_the_visa');
			$table->tinyInteger('is_the_residence_permit_valid');
			$table->integer('vacation_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('vacation_request_human_resources');
	}
}