<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffLastQualificationTable extends Migration {

	public function up()
	{
		Schema::create('staff_last_qualification', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('qualification', 80);
			$table->string('place_name', 40);
			$table->string('country', 30);
			$table->string('city', 40);
			$table->date('from');
			$table->date('to');
			$table->string('specialize', 40);
			$table->integer('staff_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('staff_last_qualification');
	}
}