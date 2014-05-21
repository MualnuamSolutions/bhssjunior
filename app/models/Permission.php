<?php

class Permission
{
   public function revoke()
   {
      $admin = Sentry::findGroupByName('Admin');
      $staff = Sentry::findGroupByName('Staff');
      $public = Sentry::findGroupByName('Public');

      $admin->permissions = [
         'home' => 1
      ];

      $staff->permissions = [
         'home' => 1
      ];

      $public->permissions = [
         'user.login' => 1,
         'user.doLogin' => 1
      ];

      $admin->save();
      $staff->save();
      $public->save();
   }
}
