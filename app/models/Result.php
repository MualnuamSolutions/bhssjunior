<?php
use LaravelBook\Ardent\Ardent;

class Result extends Ardent
{
    protected $table = 'results';

    protected $fillable = [
        'academic_session_id',
        'assessment_id',
        'status',
    ];

    protected $guarded = [
        'id'
    ];

    public static function lockStatus($academicSessionId, $assessmentId)
    {
        $result = self::where('academic_session_id', '=', $academicSessionId)
            ->where('assessment_id', '=', $assessmentId)
            ->first();

        return $result ? $result->status : false;
    }

    public static function lock($academicSessionId, $assessmentId)
    {
        $result = self::where('academic_session_id', '=', $academicSessionId)
            ->where('assessment_id', '=', $assessmentId)
            ->first();

        if (!$result) {
            $result = new Result;
            $result->academic_session_id = $academicSessionId;
            $result->assessment_id = $assessmentId;
        }

        $result->status = true;
        $result->save();
    }

    public static function unlock($academicSessionId, $assessmentId)
    {
        $result = self::where('academic_session_id', '=', $academicSessionId)
            ->where('assessment_id', '=', $assessmentId)
            ->first();

        $result->status = false;
        $result->save();
    }
}
