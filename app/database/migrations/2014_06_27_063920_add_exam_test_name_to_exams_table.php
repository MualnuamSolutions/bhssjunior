<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExamTestNameToExamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      Schema::table('exams', function(Blueprint $table){
         $table->string('name')->after('test_id')->nullable();
         $table->date('exam_date')->after('note');
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
      Schema::table('exams', function(Blueprint $table){
         $table->dropColumn('name');
         $table->dropColumn('exam_date');
      });
   }

}
