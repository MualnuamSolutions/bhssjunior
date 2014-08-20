<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassTeacherColumnsToClassRoomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('class_rooms', function(Blueprint $table) {
            $table->dropColumn('class_master_id');
            $table->integer('class_teacher2_id')->after('name')->unsigned()->nullable();
            $table->integer('class_teacher1_id')->after('name')->unsigned()->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('class_rooms', function(Blueprint $table) {
            $table->integer('class_master_id')->after('name')->unsigned()->nullable();
            $table->dropColumn('class_teacher1_id');
            $table->dropColumn('class_teacher2_id');
        });
	}

}
