<?php

class Mark extends Eloquent
{
    protected $table = 'exams_marks';

    protected $rules = [
        'test_id' => 'required',
    ];

    protected $fillable = [
        'test_id',
        'student_id',
        'academic_session_id',
        'mark',
        'remarks',
    ];

    protected $guarded = [
        'id'
    ];

    public function student()
    {
        return $this->belongsTo('Student');
    }

    public function test()
    {
        return $this->belongsTo('Test');
    }

    public function academicSession()
    {
        return $this->belongsTo('AcademicSession');
    }

    public static function validator($input)
    {
        $rules = (new self)->rules;

        foreach ($input['mark'] as $studentId => $mark) {
            $rules["mark.{$studentId}"] = "required|numeric|min:0";
        }

        $validator = Validator::make($input, $rules);

        return $validator;
    }

    public static function store($input)
    {
        if (isset($input['update']) && $input['update']) {
            Mark::where('exam_id', '=', $input['exam_id'])->delete();
        }

        $data = [];
        foreach ($input['mark'] as $studentId => $mark) {
            $data[] = [
                'exam_id' => $input['exam_id'],
                'student_id' => $studentId,
                'mark' => $mark,
                'remarks' => isset($input['remarks'][$studentId]) ? $input['remarks'][$studentId] : '',
            ];
        }

        Mark::insert($data);
    }

    public function getMarkAttribute($value)
    {
        return round($value, 2);
    }

    public static function getList()
    {
        $table = (new self)->getTable();
        $academicTable = (new AcademicSession)->getTable();

        return Mark::with(['student', 'test', 'academicSession'])
            ->join($academicTable, "{$academicTable}.id", "=", "{$table}.academic_session_id")
            ->select(["{$table}.*", "{$academicTable}.start", "{$academicTable}.end"])
            ->groupBy('test_id', 'academic_session_id')
            ->orderBy('start', 'desc')
            ->orderBy('created_at', 'desc');
    }
}
