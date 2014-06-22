<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration {

	/**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('tests', function(Blueprint $table){
         $table->increments('id');
         $table->integer('assessment_id');
         $table->integer('subject_id');
         $table->string('name');
         $table->float('weightage');
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
      Schema::drop('tests');
   }

}
