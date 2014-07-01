<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsMarksTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::drop('tests_marks');
      Schema::create('exams_marks', function (Blueprint $table) {
         $table->integer('exam_id');
         $table->integer('student_id');
         $table->float('mark');
         $table->text('remarks');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::create('tests_marks', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('test_id');
         $table->integer('student_id');
         $table->integer('academic_session_id');
         $table->float('mark');
         $table->text('remarks');
         $table->timestamps();
      });
      Schema::drop('exams_marks');
   }

}
