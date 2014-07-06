<?php

use LaravelBook\Ardent\Ardent;

class Enrollment extends Ardent
{
    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'class_room_id' => 'required',
        'academic_session_id' => 'required',
        'roll_no' => 'required|numeric',
    ];

    protected $fillable = [
        'class_room_id',
        'student_id',
        'academic_session_id',
        'roll_no',
    ];

    public function academicSession()
    {
        return $this->belongsTo('AcademicSession');
    }

    public function classRoom()
    {
        return $this->belongsTo('ClassRoom');
    }

    public function student()
    {
        return $this->belongsTo('Student');
    }

    public function getClassRoomIdAttribute($value)
    {
        return $value ? $value : null;
    }
}
