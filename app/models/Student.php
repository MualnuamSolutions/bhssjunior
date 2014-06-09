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
      'gender' => 'required',
      'father' => 'required',
      'mother' => 'required',
      'contact' => 'required',
   ];

   protected $fillable = [
      'name',
      'age',
      'gender',
      'dob',
      'father',
      'mother',
      'contact',
   ];

   protected $guarded = [
      'id'
   ];

   public static $genders = ['Male' => 'Male', 'Female' => 'Female'];

}
