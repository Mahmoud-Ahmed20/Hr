<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoanRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_requests', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->integer('administration_id')->unsigned();
            $table->string('number', 20);
			$table->date('going_date')->nullable();
            $table->decimal('advance_value',$precision = 8, $scale = 2);
            $table->decimal('basic_salary',$precision = 8, $scale = 2);
            $table->tinyInteger('direct_manager');
            $table->string('direct_manager_nots', 250)->nullable();
            $table->tinyInteger('hr');
            $table->string('hr_nots', 250)->nullable();
            $table->tinyInteger('the_accountant');
            $table->string('the_accountant_nots', 250)->nullable();
            $table->smallInteger('is_activate');
            $table->tinyInteger('archive')->default(0);
            $table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loan_requests');

    }
}
