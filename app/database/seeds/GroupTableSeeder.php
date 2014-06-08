<?php
class GroupTableSeeder extends Seeder
{
   public function run()
   {
      DB::table('groups')->truncate();

      $admin = Sentry::createGroup(
         array(
         'name'        => 'Admin',
         'permissions' => array()
      ));

      $staff = Sentry::createGroup(
         array(
         'name'        => 'Staff',
         'permissions' => array()
      ));

      $staff = Sentry::createGroup(
         array(
         'name'        => 'Public',
         'permissions' => array(
            'user.login' => 1,
            'user.doLogin' => 1
         )
      ));
   }
}
