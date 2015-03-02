<?php
use LaravelBook\Ardent\Ardent;

class ClassRoom extends Ardent
{
    // protected $table = 'class_rooms';

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'name' => 'required',
        'class_teacher1_id' => 'required',
        'class_teacher2_id' => 'required',
    ];

    protected $fillable = [
        'name',
        'class_teacher1_id',
        'class_teacher2_id',
    ];

    protected $guarded = [
        'id'
    ];

    public static $relationsData = [
        'enrollments' => [self::HAS_MANY, 'Enrollment']
    ];

    public function afterSave()
    {
        $subjects = Input::get('subjects');

        if (!empty($subjects))
            return $this->subjects()->sync($subjects);
        else
            return true;
    }

    public function subjects()
    {
        return $this->belongsToMany('Subject');
    }

    public function classTeacher1()
    {
        return $this->belongsTo('User', 'class_teacher1_id');
    }

    public function classTeacher2()
    {
        return $this->belongsTo('User', 'class_teacher2_id');
    }

    public static function getSubjectsJson()
    {
        return self::with('subjects')->orderBy('id', 'asc')->get()->toJson();
    }

    public function getNameAttribute($value)
    {
        return $value ? $value : null;
    }

    public static function getDropDownList()
    {
        return self::orderBy('id', 'asc')->get()->lists('name', 'id');
    }

    public static function data($academicSessionId = null, $limit = 20)
    {
        $enroll = (new Enrollment)->getTable();
        $class = (new ClassRoom)->getTable();
        $classSubj = (new ClassRoomSubject)->getTable();
        $user = (new User)->getTable();

        return self::leftJoin($classSubj, $class . ".id", "=", $classSubj . ".class_room_id")
            ->leftJoin($user . " as t1", $class . ".class_teacher1_id", "=", "t1.id")
            ->leftJoin($user . " as t2", $class . ".class_teacher2_id", "=", "t2.id")
            ->leftJoin($enroll, $class . ".id", "=", $enroll . ".class_room_id")
            ->groupBy($class . ".id")
            ->where(function($q) use($academicSessionId, $enroll) {
                if($academicSessionId)
                    $q->where($enroll . ".academic_session_id", "=", $academicSessionId);
            })
            ->select(
                $class . '.id',
                $class . '.name',
                DB::raw('t1.name as classTeacher1'),
                DB::raw('t2.name as classTeacher2'),
                DB::raw('COUNT(DISTINCT(' . $classSubj . '.subject_id)) as subjectCount'),
                DB::raw('COUNT(DISTINCT(' . $enroll . '.student_id)) as studentCount')
                )
            ->orderBy($class . ".id")
            ->paginate($limit);
    }
}
