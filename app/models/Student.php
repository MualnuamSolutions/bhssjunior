<?php
use LaravelBook\Ardent\Ardent;

class Student extends Ardent
{
   protected $table = 'students';

   public $autoHydrateEntityFromInput = true;
   public $forceEntityHydrationFromInput = true;

   public static $rules = [
      'name' => 'required',
      'dob' => 'required',
      'gender' => 'required',
      'father' => 'required',
      'contact1' => 'required',
   ];

   protected $fillable = [
      'regno',
      'name',
      'age',
      'gender',
      'dob',
      'father',
      'fathers_occupation',
      'mother',
      'mothers_occupation',
      'contact1',
      'contact2',
   ];

   protected $guarded = [
      'id'
   ];

   public static $relationsData = [
      'photos' => [self::HAS_MANY, 'Photo']
   ];

   public function classRooms()
   {
      return $this->belongsToMany('ClassRoom')
         ->orderBy('academic_session_id', 'asc')
         ->withPivot('roll_no', 'academic_session_id');
   }

   public function classRoom()
   {
      return $this->belongsToMany('ClassRoom')
         ->whereIn('academic_session_id', AcademicSession::getSessions()->lists('id'))
         ->withPivot('roll_no', 'academic_session_id');
   }

   public static $genders = ['Male' => 'Male', 'Female' => 'Female'];

   public function afterCreate()
   {
      $session = AcademicSession::getRecentSession();
      $regno = 'BHSSJR' . $session->start . str_pad($this->id, 4, 0, STR_PAD_LEFT);
      $this->update(['regno' => $regno]);

      $enrollment = new ClassRoomStudent();
      $enrollment->academic_session_id = Input::get('academic_session');
      $enrollment->class_room_id = Input::get('class_room');
      $enrollment->student_id = $this->id;
      $enrollment->roll_no = Input::get('roll_no');
      $enrollment->save();

      $photoPath = Input::get('photo');
      if (!empty($photoPath)) {
         $photo = new Photo(['path' => $photoPath, 'default' => true]);
         $this->photos()->save($photo);
      } else
         return true;
   }

   public function getCurrentClassAttribute($value)
   {
      return $this->classRoom->first();
   }

   public function getClassAttribute($value)
   {
      return $this->currentClass ? $this->currentClass->name : null;
   }

   public function getRollNoAttribute($value)
   {
      return $this->currentClass ? $this->currentClass->pivot->roll_no : null;
   }

}
