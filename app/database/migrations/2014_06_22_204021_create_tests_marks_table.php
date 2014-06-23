<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsMarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      Schema::create('tests_marks', function(Blueprint $table){
         $table->increments('id');
         $table->integer('test_id');
         $table->integer('student_id');
         $table->integer('academic_session_id');
         $table->float('mark');
         $table->text('remarks');
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
		Schema::drop('tests_marks');
	}

}
