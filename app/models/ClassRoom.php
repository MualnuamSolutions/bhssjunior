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
}
