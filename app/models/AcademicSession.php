<?php
use LaravelBook\Ardent\Ardent;

class AcademicSession extends Ardent
{
    protected $table = 'academic_sessions';

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'start' => 'required',
        'end' => 'required'
    ];

    protected $fillable = [
        'start',
        'end'
    ];

    protected $guarded = [
        'id'
    ];

    public function getIdAttribute($value)
    {
        return isset($this->id) ? $value : 0;
    }

    public function getSessionAttribute()
    {
        return $this->start . " - " . $this->end;
    }

    public static function getDropDownList()
    {
        return self::getSessions()->lists('session', 'id');
    }

    public static function getRecentSession()
    {
        return self::orderBy('start', 'desc')->first();
    }

    public static function getSessions()
    {
        return self::orderBy('start', 'desc')->get();
    }

    public static function currentSession()
    {
        $currentSession = Option::data('current_session', 0);

        if( Session::has('currentSession') ) 
            $currentSession = Session::get('currentSession');

        return self::find($currentSession);
    }

    public static function setCurrentSession($session)
    {
        if($session == 0)
            $session = Option::data('current_session', 0);

        return Session::put('currentSession', $session);
    }
}
