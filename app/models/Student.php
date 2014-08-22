<?php
use LaravelBook\Ardent\Ardent;
use \Mualnuam\ImageHelper;

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
        'photos' => [self::HAS_MANY, 'Photo'],
        'photo' => [self::HAS_ONE, 'Photo']
    ];

    public static $genders = ['Male' => 'Male', 'Female' => 'Female'];

    public function enrollments()
    {
        return $this->belongsToMany('Enrollment');
    }

    public function enrollment()
    {
        $session = AcademicSession::getRecentSession();
        return $this->hasOne('Enrollment')->whereAcademicSessionId($session->id);
    }

    public function measurement()
    {
        $session = AcademicSession::getRecentSession();
        return $this->hasOne('Measurement')->whereAcademicSessionId($session->id);
    }

    public function afterCreate()
    {
        $session = AcademicSession::getRecentSession();
        $regno = 'BHSSJR' . $session->start . str_pad($this->id, 4, 0, STR_PAD_LEFT);
        $this->update(['regno' => $regno]);

        $enrollment = new Enrollment;
        $enrollment->academic_session_id = Input::get('academic_session');
        $enrollment->class_room_id = Input::get('class_room');
        $enrollment->student_id = $this->id;
        $enrollment->roll_no = Input::get('roll_no');
        $enrollment->save();

        $photoPath = Input::get('photo') ? ImageHelper::store(Input::get('photo')) : null;
        if (!empty($photoPath)) {
            $photo = new Photo(['path' => $photoPath, 'default' => true]);
            $this->photos()->save($photo);
        } else
            return true;
    }

    public function getCurrentClassAttribute($value)
    {
        return $this->enrollment ? $this->enrollment->classRoom : null;
    }

    public function getClassAttribute($value)
    {
        return $this->currentClass ? $this->currentClass->name : $this->lastClassName;
    }

    public function getRollNoAttribute($value)
    {
        return $this->enrollment ? $this->enrollment->roll_no : null;
    }

    public function getLastClassAttribute()
    {
        $academicSessionTable = (new AcademicSession)->getTable();
        $enrollmentTable = (new Enrollment)->getTable();

        $enrollment = Enrollment::join($academicSessionTable, $enrollmentTable . '.academic_session_id', '=', $academicSessionTable . '.id')
            ->whereStudentId($this->id)
            ->orderBy('start', 'desc')
            ->first();

        return $enrollment ? ClassRoom::find($enrollment->class_room_id) : null;
    }

    public function getLastClassNameAttribute()
    {
        $lastClass = $this->lastClass;
        return $lastClass ? $lastClass->name : null;
    }

}
