<?php
use LaravelBook\Ardent\Ardent;

class ClassRoom extends Ardent
{
   // protected $table = 'class_rooms';

   public $autoHydrateEntityFromInput = true;
   public $forceEntityHydrationFromInput = true;

   public static $rules = [
      'name' => 'required'
   ];

   protected $fillable = [
      'name'
   ];

   protected $guarded = [
      'id'
   ];

   public static $relationsData = [
      'subjects'  => [self::BELONGS_TO_MANY, 'Subject'],
      'students'  => [self::BELONGS_TO_MANY, 'Student']
   ];

   public function afterSave()
   {
      $subjects = Input::get('subjects');
      if ( !empty($subjects) )
         return $this->subjects()->sync($subjects);
      else
         return true;
   }
}
