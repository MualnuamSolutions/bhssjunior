<?php
use LaravelBook\Ardent\Ardent;

class Photo extends Ardent
{
   protected $table = 'photos';

   public $autoHydrateEntityFromInput = true;
   public $forceEntityHydrationFromInput = true;

   public static $rules = [];

   protected $fillable = [
      'student_id',
      'path',
      'default',
   ];

   protected $guarded = [
      'id'
   ];
}
