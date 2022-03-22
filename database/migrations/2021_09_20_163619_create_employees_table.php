<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('employees', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('city', 20);
			$table->string('position_applied_of', 50);
			$table->string('photo', 150)->nullable();
			$table->string('first_name', 30);
			$table->string('father_name', 30);
			$table->string('grandfather_name', 30);
			$table->string('family_name', 30);
			$table->string('birth', 20);
			$table->string('place_of_birth', 30);
			$table->string('nationality', 30);
			$table->string('religion', 20);
			$table->integer('marital_status')->nullable();
			$table->integer('employed_by_this_company')->nullable();
			$table->string('start_working', 50)->nullable();
			$table->integer('employed_now')->nullable();
			$table->integer('dependents')->nullable();
			$table->string('G_O_S_I_O_available', 20)->nullable();
			$table->string('minimum_salary_required', 20)->nullable();
			$table->string('other_data', 200)->nullable();
			$table->integer('judicial_ruling')->nullable();
			$table->string('reason_judicial_ruling', 200)->nullable();
			$table->string('get_to_know_the_job', 200)->nullable();
            $table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('employees');
	}
}
