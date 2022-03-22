<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UnderTheScabies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('under_the_scabies', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id');
            $table->integer('job_id');
            $table->integer('administrations_id');
            $table->string('direct_admin_name',20);
            $table->date('date_of_being_hired');
            $table->date('performance_appraisal_date');
            $table->decimal('maintain_working_hours', $precision = 8, $scale = 2);
            $table->decimal('good_productivity_performance', $precision = 8, $scale = 2);
            $table->decimal('production_quantity', $precision = 8, $scale = 2);
            $table->decimal('learning_ability', $precision = 8, $scale = 2);
            $table->decimal('work_progress', $precision = 8, $scale = 2);
            $table->decimal('adhere_to_the_directives_instructions', $precision = 8, $scale = 2);
            $table->decimal('initiative_and_quick_wit', $precision = 8, $scale = 2);
            $table->decimal('relationship_with_colleagues', $precision = 8, $scale = 2);
            $table->decimal('ability_to_organize_work', $precision = 8, $scale = 2);
            $table->decimal('take_advantage_of_working_time', $precision = 8, $scale = 2);
            $table->string('direct_administrators_recommendation',25);
            $table->string('notes',500)->nullable();
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
        Schema::drop('under_the_scabies');
    }
}
