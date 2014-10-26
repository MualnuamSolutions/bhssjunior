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
        'user_id'
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

    public function user()
    {
        return $this->belongsTo('User');
    }

    public static function store($input)
    {
        $user = Sentry::getUser();
        $exam = Exam::create([
            'test_id' => $input['test_id'],
            'name' => $input['name'],
            'academic_session_id' => $input['academic_session_id'],
            'class_room_id' => $input['class_room_id'],
            'note' => $input['note'],
            'exam_date' => $input['exam_date'],
            'user_id' => $user->id,
        ]);

        $input['exam_id'] = $exam->id;

        Mark::store($input);
    }

    public static function getSubjectTeachers($subjectId, $classRoomId, $academicSessionId = null, $excludeGroup = null)
    {
        $testTable = (new Test)->getTable();
        $userTable = (new User)->getTable();
        $table = (new self)->getTable();

        $session = AcademicSession::getRecentSession();
        $academicSessionId = $session->id;

        return Exam::join($testTable, $testTable . '.id', '=', $table . '.test_id')
            ->join($userTable, $userTable . '.id', '=', $table . '.user_id')
            ->join('users_groups', 'users_groups.user_id', '=', 'users.id')
            ->where('subject_id', '=', $subjectId)
            ->where('academic_session_id', '=', $academicSessionId)
            ->where('class_room_id', '=', $classRoomId)
            ->where(function($q) use ($excludeGroup){
                if($excludeGroup)
                    $q->where('users_groups.group_id', '!=', $excludeGroup); // Exclude all marks entered by group
            })
            ->select(
                DB::raw("DISTINCT('user_id')"),
                $userTable . '.id',
                $userTable . '.name'
            )
            ->get();
    }

    public static function getTests($subjectId, $classRoomId, $academicSessionId = null, $excludeGroup = null)
    {
        $testTable = (new Test)->getTable();
        $userTable = (new User)->getTable();
        $table = (new self)->getTable();

        $session = AcademicSession::getRecentSession();
        $academicSessionId = $session->id;

        return Exam::join($testTable, $testTable . '.id', '=', $table . '.test_id')
            ->join($userTable, $userTable . '.id', '=', $table . '.user_id')
            ->join('users_groups', 'users_groups.user_id', '=', 'users.id')
            ->where(function($q) use ($excludeGroup){
                if($excludeGroup)
                    $q->where('users_groups.group_id', '!=', $excludeGroup); // Exclude all marks entered by group
            })
            ->where('subject_id', '=', $subjectId)
            ->where('academic_session_id', '=', $academicSessionId)
            ->where('class_room_id', '=', $classRoomId)
            ->get();
    }

    public static function getCompletedAssessments($classRoomId)
    {
        $testTable = (new Test)->getTable();
        $assessmentTable = (new Assessment)->getTable();
        $table = (new self)->getTable();

        $session = AcademicSession::getRecentSession();
        $academicSessionId = $session->id;

        return Exam::join($testTable, $testTable . '.id', '=', $table . '.test_id')
            ->join($assessmentTable, $assessmentTable . '.id', '=', $testTable . '.assessment_id')
            ->where('academic_session_id', '=', $academicSessionId)
            ->where('class_room_id', '=', $classRoomId)
            ->select(
                DB::raw("DISTINCT('" . $testTable . ".assessment_id')"),
                $assessmentTable . '.name',
                $assessmentTable . '.short_name'
            )
            ->get();
    }
}
