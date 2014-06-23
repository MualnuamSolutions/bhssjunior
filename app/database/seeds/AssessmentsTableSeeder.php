<?php

class AssessmentsTableSeeder extends Seeder {
   public function run()
   {
      // Create the super user
      DB::table('assessments')->truncate();


      DB::table('assessments')->insert(array(
         array('name'=>'Formative Assessment 1', 'term'=>'1', 'weightage' => 20),
         array('name'=>'Formative Assessment 2', 'term'=>'2', 'weightage' => 30),
         array('name'=>'Summative Assessment 1', 'term'=>'1', 'weightage' => 20),
         array('name'=>'Summative Assessment 2', 'term'=>'2', 'weightage' => 30),
         ));
   }

}
