<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveClassRoomIdFormTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      Schema::table('tests', function(Blueprint $table){
         $table->dropColumn('class_room_id');
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
      Schema::table('tests', function(Blueprint $table){
         $table->integer('class_room_id')->after('assessment_id');
      });
	}

}
