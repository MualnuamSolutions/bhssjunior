<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameWeightageToTotalmarksInTestsTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('tests', function (Blueprint $table) {
         $table->dropColumn('weightage');
         $table->float('totalmarks')->after('name');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('tests', function (Blueprint $table) {
         $table->dropColumn('totalmarks');
         $table->float('weightage');
      });
   }

}
