<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVocationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('vocation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('request_date');
			$table->integer('name_id');
			$table->string('job_title', 30);
			$table->bigInteger('job_number');
			$table->date('first_day_off');
			$table->date('last_date_off');
			$table->string('address_in_vacation', 300);
			$table->string('phone', 20);
			$table->string('reason_for_leave', 20);
            $table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('vocation_requests');
	}
}