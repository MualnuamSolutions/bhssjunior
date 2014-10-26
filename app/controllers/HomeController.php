<?php
use \Mualnuam\Permission;

class HomeController extends BaseController
{
   public function index()
   {
      return View::make('home');
   }

   public function refresh()
   {
      $permission = new Permission;
      $permissions = $permission->revoke();

      return View::make('refresh', compact('permissions'));
   }

   public function denied()
   {
      return View::make('error.denied');
   }
   
   public function missing()
   {
      return View::make('error.missing');
   }
}
