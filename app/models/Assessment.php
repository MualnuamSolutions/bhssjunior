<?php
use LaravelBook\Ardent\Ardent;

class Assessment extends Ardent
{
   protected $table = 'assessments';

   public $autoHydrateEntityFromInput = true;
   public $forceEntityHydrationFromInput = true;

   public static $terms = [1 => 'First Term', 2 => 'Second Term'];

   public static $rules = [
      'name' => 'required',
      'term' => 'required'
   ];

   protected $fillable = [
      'name',
      'term'
   ];

   protected $guarded = [
      'id'
   ];

   public function getTermNameAttribute($value)
   {
      return array_key_exists($this->term, self::$terms) ? self::$terms[$this->term] : null;
   }

   public function getDisplayWeightageAttribute($value)
   {
      return $this->weightage ? $this->weightage . '% ' : null;
   }

   public static function getDropDownList()
   {
      return self::orderBy('name', 'asc')->get()->lists('name', 'id');
   }
}
