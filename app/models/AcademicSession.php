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

   public static function getSessionsForDropdown()
   {
      return AcademicSession::orderBy('start', 'desc')
         ->select('id', DB::raw('CONCAT(CONCAT(start, " - "), end) as session'))
         ->lists('session', 'id');
   }
}
