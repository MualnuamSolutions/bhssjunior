<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClassMasterColumnToClassRoomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('class_rooms', function(Blueprint $table) {
            $table->integer('class_master_id')->after('name')->unsigned()->nullable();
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
            $table->dropColumn('class_master_id');
        });
	}

}
