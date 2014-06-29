<?php

class Exam extends Eloquent
{
   protected $table = 'exams';

   protected $rules = [
      'test_id' => 'required',
      'name' => 'required',
      'exam_date' => 'required',
   ];

   protected $fillable = [
      'test_id',
      'name',
      'academic_session_id',
      'class_room_id',
      'note',
      'exam_date',
   ];

   protected $guarded = [
      'id'
   ];

   public function marks()
   {
      return $this->hasMany('Mark');
   }

   public function test()
   {
      return $this->belongsTo('Test');
   }

   public function academicSession()
   {
      return $this->belongsTo('AcademicSession');
   }

   public function classRoom()
   {
      return $this->belongsTo('ClassRoom');
   }

   public static function store($input)
   {
      $exam = Exam::create([
         'test_id' => $input['test_id'],
         'name' => $input['name'],
         'academic_session_id' => $input['academic_session_id'],
         'class_room_id' => $input['class_room_id'],
         'note' => $input['note'],
         'exam_date' => $input['exam_date'],
      ]);

      $input['exam_id'] = $exam->id;

      Mark::store($input);
   }
}
