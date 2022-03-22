<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	public function up()
	{
		Schema::create('admins', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 60);
			$table->string('email', 60);
			$table->string('password', 250);
			$table->string('phone', 20)->nullable();
			$table->string('photo', 255)->nullable();
			$table->integer('is_activate');
            $table->tinyInteger('archive')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('admins');
	}
}
