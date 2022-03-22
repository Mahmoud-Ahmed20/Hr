<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatejobofferemployeesspecificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offer_employees_specification', function (Blueprint $table) {
			$table->increments('id');
            $table->string('name',40);
            // nationality foreign key ****index*******
            $table->integer('nationality_id')->unsigned();
            $table->date('date');
            $table->bigInteger('passpor_number');
            $table->string('passpor_issue',40);
            $table->date('passpor_issue_id');
            // job foreign key ****index*******
            $table->integer('job_id')->unsigned();
            $table->string('degree_job',30);
            $table->string('qualification',40);
            // administration foreign key ****index*******
            $table->integer('administration_id')->unsigned();
            $table->string('branch',30);
            $table->string('degree',30);
            $table->string('year_contract',20);
            $table->smallInteger('is_activate');
            $table->tinyInteger('archive')->default(0);
            $table->tinyInteger('yearly_vacation');
            $table->tinyInteger('treatment');
            $table->tinyInteger('Probation');
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
        Schema::dropIfExists('employees_job_offer_specification');
    }
}
