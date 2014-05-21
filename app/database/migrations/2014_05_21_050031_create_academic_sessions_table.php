<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicSessionsTable extends Migration {

	/**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('academic_sessions', function(Blueprint $table){
         $table->increments('id');
         $table->integer('start', 4);
         $table->integer('end', 4);
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
      Schema::drop('academic_sessions');
   }

}
