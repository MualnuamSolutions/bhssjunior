<?php

class OptionTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->truncate();


        DB::table('options')->insert(array(
            array('option_key' => 'site_title', 'option_title' => 'Site Title', 'option_data' => 'School Management System'),
            array('option_key' => 'item_per_page', 'option_title' => 'Item Per Page', 'option_data' => '20'),
            array('option_key' => 'grade_o', 'option_title' => 'Grade O', 'option_data' => '9'),
            array('option_key' => 'grade_a', 'option_title' => 'Grade A', 'option_data' => '8'),
            array('option_key' => 'grade_b', 'option_title' => 'Grade B', 'option_data' => '6'),
            array('option_key' => 'grade_c', 'option_title' => 'Grade C', 'option_data' => '5'),
            array('option_key' => 'grade_d', 'option_title' => 'Grade D', 'option_data' => '0'),
        ));

    }

}
