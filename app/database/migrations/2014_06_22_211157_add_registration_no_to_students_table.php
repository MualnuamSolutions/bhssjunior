<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegistrationNoToStudentsTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('students', function (Blueprint $table) {
         $table->string('regno')->after('id');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('students', function (Blueprint $table) {
         $table->dropColumn('regno');
      });
   }

}
