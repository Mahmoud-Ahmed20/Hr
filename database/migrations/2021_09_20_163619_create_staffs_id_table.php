<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffsIdTable extends Migration {

	public function up()
	{
		Schema::create('staffs_id', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->bigInteger('card_id')->nullable();
			$table->string('place_of_issue', 30)->nullable();
			$table->date('date_of_issue')->nullable();
			$table->integer('staff_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('staffs_id');
	}
}