<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassRoomStudentsTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('class_room_student', function (Blueprint $table) {
         $table->integer('class_room_id')->unsigned()->index();
         $table->integer('student_id')->unsigned()->index();
         $table->integer('academic_session_id');
         $table->integer('roll_no')->nullable();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::drop('class_room_student');
   }

}
