<?php
use LaravelBook\Ardent\Ardent;

class Test extends Ardent
{
   protected $table = 'tests';

   public $autoHydrateEntityFromInput = true;
   public $forceEntityHydrationFromInput = true;

   public static $rules = [
      'assessment_id' => 'required',
      'subject_id' => 'required',
      'name' => 'required',
      'totalmarks' => 'required',
   ];

   protected $fillable = [
      'assessment_id',
      'subject_id',
      'name',
      'totalmarks',
   ];

   protected $guarded = [
      'id'
   ];

   public static $relationsData = [
      'subject'  => [self::BELONGS_TO, 'Subject'],
      'classRoom'  => [self::BELONGS_TO, 'ClassRoom'],
      'assessment'  => [self::BELONGS_TO, 'Assessment']
   ];

   public function getDisplayWeightageAttribute($value)
   {
      return $this->weightage ? $this->weightage . '% ' : null;
   }
}
