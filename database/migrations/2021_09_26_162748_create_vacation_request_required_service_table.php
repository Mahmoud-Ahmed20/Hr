<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVacationRequestRequiredServiceTable extends Migration {

	public function up()
	{
		Schema::create('vacation_request_required_service', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('exit_and_return_visa', 80);
			$table->string('country_visa', 40);
			$table->string('ticket_reservation', 60);
			$table->string('ticket_reimbursement', 60);
			$table->string('notes_one', 200)->nullable();
			$table->date('date_travel');
			$table->string('air_line', 30);
			$table->string('line', 30);
			$table->integer('vacation_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('vacation_request_required_service');
	}
}