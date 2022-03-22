<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenaltyProceduresTable extends Migration {

	public function up()
	{
		Schema::create('penalty_procedures', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('Staff_id');
			$table->integer('section_id');
			$table->date('joining_date');
			$table->bigInteger('number');
			$table->integer('administration_id');
			$table->string('job_title', 30);
			$table->date('last_penalty');
			$table->string('subject', 300);
			$table->tinyInteger('draw_attention')->nullable();
			$table->tinyInteger('penalty')->nullable();
			$table->smallInteger('deduction')->nullable();
			$table->tinyInteger('written_warning_by_fired')->nullable();
			$table->tinyInteger('others')->nullable();
			$table->smallInteger('stopping_from_work_for')->nullable();
			$table->tinyInteger('stopping_the_yearly_increase')->nullable();
			$table->tinyInteger('firing_with_a_bying')->nullable();
			$table->tinyInteger('firing_without_a_bying')->nullable();
            $table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('penalty_procedures');
	}
}
