<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPhysicalMeasurementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('measurements', function(Blueprint $table){
            $table->increments('id');
            $table->integer('student_id')->unsigned()->index();
            $table->integer('academic_session_id');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
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
        Schema::drop('measurements');
	}

}
