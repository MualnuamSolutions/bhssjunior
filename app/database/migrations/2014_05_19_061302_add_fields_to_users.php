<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsers extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->string('name');
            $table->date('dob')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('qualification')->nullable();
            $table->string('professional_training')->nullable();
            $table->string('father')->nullable();
            $table->string('phone')->nullable();
            $table->string('epic_no')->nullable();
            $table->text('address')->nullable();
            $table->string('signature', 300)->nullable();
            $table->string('photo', 300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('dob');
            $table->dropColumn('date_of_joining');
            $table->dropColumn('qualification');
            $table->dropColumn('professional_training');
            $table->dropColumn('father');
            $table->dropColumn('phone');
            $table->dropColumn('epic_no');
            $table->dropColumn('address');
            $table->dropColumn('signature');
            $table->dropColumn('photo');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
        });
    }

}
