<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatejobofferSalariesSpecificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offer_Salaries_Specification', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('basic_salary_monthly', $precision = 8, $scale = 2);
            $table->decimal('basic_salary_Year',$precision = 8, $scale = 2);
            $table->decimal('housing_allowance_monthly',$precision = 8, $scale = 2)->nullable();
            $table->decimal('housing_allowance_Year',$precision = 8, $scale = 2)->nullable();
            $table->decimal('switch_connectors_monthly',$precision = 8, $scale = 2)->nullable();
            $table->decimal('switch_connectors_Year',$precision = 8, $scale = 2)->nullable();
            $table->decimal('other_allowances_Year',$precision = 8, $scale = 2)->nullable();
            $table->decimal('other_allowances_monthly',$precision = 8, $scale = 2)->nullable();
            $table->integer('employees_job_offer_specification_id')->unsigned();
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
        Schema::dropIfExists('job_offer_Salaries_Specification');
    }
}
