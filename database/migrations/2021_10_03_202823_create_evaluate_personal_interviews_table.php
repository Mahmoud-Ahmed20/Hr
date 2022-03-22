<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluatePersonalInterviewsTable extends Migration {

	public function up()
	{
		Schema::create('evaluate_personal_interviews', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->string('qualification', 60);
			$table->string('job_title', 40);
			$table->string('section', 30);
			$table->smallInteger('extrerior');
			$table->smallInteger('personal');
			$table->smallInteger('team_work');
			$table->smallInteger('initiatire');
			$table->smallInteger('english');
			$table->smallInteger('ambition');
			$table->smallInteger('make_decision');
			$table->smallInteger('experience');
			$table->smallInteger('skills');
			$table->smallInteger('qualification_skills');
			$table->date('interview_date');
			$table->string('interview_status', 15);
			$table->string('notes', 300);
			$table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('evaluate_personal_interviews');
	}
}