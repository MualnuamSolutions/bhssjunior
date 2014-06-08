<?php
use LaravelBook\Ardent\Ardent;

class Student extends Ardent
{
   protected $table = 'students';

   public $autoHydrateEntityFromInput = true;
   public $forceEntityHydrationFromInput = true;

   public static $rules = [
      'name' => 'required',
      'age' => 'required',
      'dob' => 'required',
      'father' => 'required',
      'mother' => 'required',
      'contact' => 'required',
   ];

   protected $fillable = [
      'name',
      'age',
      'dob',
      'father',
      'mother',
      'contact',
   ];

   protected $guarded = [
      'id'
   ];

   public function getAge()
   {
      return date('Y') - date('Y', strtotime($this->dob));
   }
}
