<?php

use LaravelBook\Ardent\Ardent;

class Measurement extends Ardent
{
    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'academic_session_id' => 'required',
        'height' => 'required',
        'weight' => 'required',
    ];

    protected $fillable = [
        'student_id',
        'academic_session_id',
        'height',
        'weight',
    ];

    public function academicSession()
    {
        return $this->belongsTo('AcademicSession');
    }

    public function student()
    {
        return $this->belongsTo('Student');
    }

    public static function get($studentId = null, $paginate = false)
    {
        $academicSession = (new AcademicSession)->getTable();
        $measurement = (new Measurement)->getTable();

        $measurements = Measurement::with('academicSession')
            ->join($academicSession, $academicSession . '.id', '=', 'academic_session_id')
            ->where(function($q) use ($studentId) {
                if($studentId)
                    $q->where('student_id', '=', $studentId);
            })
            ->orderBy($academicSession . '.start', 'desc')
            ->orderBy($measurement . '.created_at', 'desc');

        if($paginate)
            return $measurements->paginate();
        else
            return $measurements->get();
    }
}
