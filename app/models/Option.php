<?php
use LaravelBook\Ardent\Ardent;

class Option extends Ardent
{
    protected $table = 'options';

    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

    public static $rules = [
        'option_key' => 'required',
        'option_title' => 'required',
        'option_data' => 'required'
    ];

    protected $fillable = [
        'option_key' => 'required',
        'option_title' => 'required',
        'option_data' => 'required'
    ];

    protected $guarded = [
        'id'
    ];

    public static function data($key = null, $default = null)
    {
        if ($key == null)
            return $default ? $default : null;

        $option = self::where('option_key', '=', $key)->first();
        return $option ? $option->option_data : $default;
    }
}
