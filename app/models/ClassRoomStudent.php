<?php
class ClassRoomStudent extends Eloquent
{
   protected $table = 'class_room_student';

   public $timestamps = false;

   protected $fillable = [
      'class_room_id',
      'student_id',
      'academic_session_id',
      'roll_no',
   ];
}
