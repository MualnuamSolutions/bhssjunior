<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHouseColumnToStudents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enrollments', function(Blueprint $table){
            $table->string('house')->nullable()->default('')->after('roll_no');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('enrollments', function(Blueprint $table){
            $table->dropColumn('house');
        });
	}

}
