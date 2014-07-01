<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('students', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->string('gender');
         $table->date('dob')->nullable();
         $table->string('father')->nullable();
         $table->string('fathers_occupation')->nullable();
         $table->string('mother')->nullable();
         $table->string('mothers_occupation')->nullable();
         $table->string('address')->nullable();
         $table->string('contact1')->nullable();
         $table->string('contact2')->nullable();
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
      Schema::drop('students');
   }

}
