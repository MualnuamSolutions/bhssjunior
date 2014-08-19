<?php
use LaravelBook\Ardent\Ardent;

class Subject extends Ardent
{
   protected $table = 'subjects';

   public $autoHydrateEntityFromInput = true;
   public $forceEntityHydrationFromInput = true;

   public static $rules = [
      'name' => 'required'
   ];

   protected $fillable = [
      'name',
      'type'
   ];

   protected $guarded = [
      'id'
   ];

   public static function getDropDownList()
   {
      return self::orderBy('name', 'asc')->get()->lists('name', 'id');
   }

}
