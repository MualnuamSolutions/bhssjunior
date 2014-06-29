<?php namespace Mualnuam;
use Sentry;

class Permission
{
   public static function getPermissions($type = null)
   {
      $permissions = [
         'Admin' => [
            'logout' => 1,
            'login' => 1,
            'doLogin' => 1,
            'students.uploadPhoto' => 1,
         ],

         'Staff' => [
            'logout' => 1,
            'login' => 1,
            'doLogin' => 1,
         ]
      ];

      return $permissions;
   }

   public static function revoke()
   {
      $lists = self::getPermissions();

      foreach($lists as $groupName => $list) {
         $group = Sentry::findGroupByName($groupName);
         $group->permissions = $list;
         $group->save();
      }

      return $lists;
   }
}
