<?php

class UserTableSeeder extends Seeder
{
   public function run()
   {
      // Create the super user
      $user = Sentry::createUser(array(
         'email' => 'alanpachuau@gmail.com',
         'name' => 'Alan Pachuau',
         'password' => 'pass',
         'activated' => 1,
         'permissions' => array('superuser' => 1)
      ));

      $user = Sentry::createUser(array(
         'email' => 'zdlalnunmawia@yahoo.com',
         'name' => 'ZD Lalnunmawia',
         'password' => 'pass',
         'activated' => 1,
         'permissions' => array('superuser' => 1)
      ));
   }

}
