<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffSalariesTable extends Migration {

	public function up()
	{
		Schema::create('staff_salaries', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->decimal('salary');
			$table->decimal('current_housing');
			$table->decimal('current_transportation');
			$table->decimal('other_allowances');
			$table->tinyInteger('type');
			$table->integer('staff_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('staff_salaries');
	}
}