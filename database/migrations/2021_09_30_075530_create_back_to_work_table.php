<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBackToWorkTable extends Migration {

	public function up()
	{
		Schema::create('back_to_work', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('date');
			$table->integer('Staff_id');
			$table->bigInteger('job_number');
			$table->string('job_title', 40);
			$table->string('reason_for_leave', 20);
			$table->date('first_day_off');
			$table->date('last_date_off');
			$table->date('date_word_resumed');
			$table->smallInteger('no_of_actual_vacation_days');
			$table->smallInteger('hr_total_no_actual_vacation_days');
			$table->smallInteger('hr_difference_between_vacation_days');
			$table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('back_to_work');
	}
}