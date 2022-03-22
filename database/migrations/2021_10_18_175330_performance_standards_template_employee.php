<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerformanceStandardsTemplateEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_standards_template_employee', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id');
            $table->string('job_title',25);
            $table->string('understand_business_rules',25);
            $table->string('get_work_done',25);
            $table->string('responding_to_work_pressure',25);
            $table->string('initiative_and_innovation_at_work',25);
            $table->string('accept_directives_from_managers',25);
            $table->string('flexibility_and_adaptability',25);
            $table->string('make_decisions_and_take_responsibility',25);
            $table->string('personal_cleanliness',25);
            $table->string('adhere_to_corporate_policies',25);
            $table->string('teamwork',25);
            $table->string('understand_notes',300)->nullable();
            $table->string('get_work_done_notes',300)->nullable();
            $table->string('responding_to_work_pressure_notes',300)->nullable();
            $table->string('initiative_and_innovation_at_work_notes',300)->nullable();
            $table->string('accept_directives_from_managers_notes',300)->nullable();
            $table->string('flexibility_and_adaptability_notes',300)->nullable();
            $table->string('make_decisions_and_take_responsibility_notes',300)->nullable();
            $table->string('personal_cleanliness_notes',300)->nullable();
            $table->string('adhere_to_corporate_policies_notes',300)->nullable();
            $table->string('teamwork_notes',300)->nullable();
            $table->tinyInteger('is_activate');
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
        Schema::drop('performance_standards_template_employee');

    }
}
