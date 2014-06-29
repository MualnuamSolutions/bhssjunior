<?php
class GroupTableSeeder extends Seeder
{
   public function run()
   {
      DB::table('groups')->truncate();

      Sentry::createGroup(
         array(
         'name'        => 'Admin',
         'permissions' => array()
      ));

      Sentry::createGroup(
         array(
         'name'        => 'Staff',
         'permissions' => array()
      ));
   }
}
