<?php
use LaravelBook\Ardent\Ardent;

class AcademicSession extends Ardent
{
   protected $table = 'academic_sessions';

   public $autoHydrateEntityFromInput = true;
   public $forceEntityHydrationFromInput = true;

   public static $rules = [
      'start' => 'required',
      'end' => 'required'
   ];

   protected $fillable = [
      'start',
      'end'
   ];

   protected $guarded = [
      'id'
   ];

   public function getIdAttribute($value)
   {
      return isset($this->id) ? $value : 0;
   }

   public function getSessionAttribute()
   {
      return $this->start . " - " . $this->end;
   }

   public static function getSessionsForDropdown()
   {
      return self::getSessions()->lists('session', 'id');
   }

   public static function getRecentSession()
   {
      return self::orderBy('start', 'desc')->first();
   }

   public static function getSessions()
   {
      return self::orderBy('start', 'asc')->get();
   }
}
