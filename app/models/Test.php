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
      'subject' => [self::BELONGS_TO, 'Subject'],
      'classRoom' => [self::BELONGS_TO, 'ClassRoom'],
      'assessment' => [self::BELONGS_TO, 'Assessment']
   ];

   public static function getDropDownList($input = [])
   {
      return self::where(function ($query) use ($input) {
         if (isset($input['assessment_id']))
            $query->where('assessment_id', '=', $input['assessment_id']);

         if (isset($input['subject_id']))
            $query->where('subject_id', '=', $input['subject_id']);
      })
         ->select(['id', DB::raw('CONCAT(name, " - ", totalmarks, " marks") AS name_mark')])
         ->get()
         ->lists('name_mark', 'id');
   }
}
