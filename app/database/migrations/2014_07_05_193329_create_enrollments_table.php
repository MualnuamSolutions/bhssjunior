<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enrollments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('class_room_id')->unsigned()->index();
            $table->integer('student_id')->unsigned()->index();
            $table->integer('academic_session_id');
            $table->integer('roll_no')->nullable();
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
		Schema::drop('enrollments');
	}

}
