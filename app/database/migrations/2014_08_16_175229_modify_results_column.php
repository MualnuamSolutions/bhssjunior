<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyResultsColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::drop('results');
        Schema::create('results_configurations', function($table){
            $table->increments('id');
            $table->integer('academic_session_id')->unsigned()->unique();
            $table->string('grade_a');
            $table->string('grade_b');
            $table->string('grade_c');
            $table->string('grade_d');
            $table->string('grade_o');
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::drop('results_configurations');
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->timestamps();
        });
	}

}
