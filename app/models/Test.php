<?php
use LaravelBook\Ardent\Ardent;

class Test extends Ardent
{
   protected $table = 'tests';

   public $autoHydrateEntityFromInput = true;
   public $forceEntityHydrationFromInput = true;

   public static $rules = [
      'subject_id' => 'required',
      'name' => 'required',
      'weightage' => 'required',
   ];

   protected $fillable = [
      'assessment_id',
      'subject_id',
      'name',
      'weightage',
   ];

   protected $guarded = [
      'id'
   ];

   public function getDisplayWeightageAttribute($value)
   {
      return $this->weightage ? $this->weightage . '% ' : null;
   }
}
