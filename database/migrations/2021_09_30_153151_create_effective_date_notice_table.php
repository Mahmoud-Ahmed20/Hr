<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEffectiveDateNoticeTable extends Migration {

	public function up()
	{
		Schema::create('effective_date_notice', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('Staff_id');
			$table->integer('job_id');
			$table->bigInteger('id_number');
			$table->integer('administration_id');
			$table->integer('section_id');
			$table->integer('nationality_id');
			$table->date('start_working_at');
			$table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('effective_date_notice');
	}
}
