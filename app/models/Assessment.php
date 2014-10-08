<?php
use LaravelBook\Ardent\Ardent;

class Assessment extends Ardent
{
    protected $table = 'assessments';

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $terms = [1 => 'First Term', 2 => 'Second Term', 3 => 'Third Term', 4 => 'Fourth Term', 5 => 'Fifth Term', 6 => 'Sixth Term'];

    public static $rules = [
        'name' => 'required',
        'short_name' => 'required',
        'description' => 'required',
        'term' => 'required',
        'order' => 'required',
        'weightage' => 'required',
    ];

    protected $fillable = [
        'name',
        'short_name',
        'description',
        'term',
        'order',
        'weightage'
    ];

    protected $guarded = [
        'id'
    ];

    public function getTermNameAttribute($value)
    {
        return array_key_exists($this->term, self::$terms) ? self::$terms[$this->term] : null;
    }

    public function getDisplayWeightageAttribute($value)
    {
        return $this->weightage ? $this->weightage . '% ' : null;
    }

    public static function getDropDownList($short = false)
    {
        $assessments = self::orderBy('order', 'asc')->get();

        if($short)
            return $assessments->lists('short_name', 'id');
        else
            return $assessments->lists('name', 'id');
    }
}
