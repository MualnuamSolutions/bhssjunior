<?php

class Option extends Eloquent
{
    protected $table = 'options';

    public $timestamps = false;

    public static $rules = [
        'site_title' => 'required',
        'item_per_page' => 'required',
        'grade_o' => 'required',
        'grade_a' => 'required',
        'grade_b' => 'required',
        'grade_c' => 'required',
        'grade_d' => 'required',
        'current_assessment' => 'required'
    ];

    public static function data($key = null, $default = null)
    {
        if ($key == null)
            return $default ? $default : null;

        $option = self::where('option_key', '=', $key)->first();
        return $option ? $option->option_data : $default;
    }

    public static function validator($input)
    {
        $validator = Validator::make($input, self::$rules);

        return $validator;
    }

    public static function store($input)
    {
        unset($input['_token']);

        foreach($input as $optionKey => $optionData) {
            $option = Option::where('option_key', '=', $optionKey)->first();

            if($option) {
                $option->option_data = $optionData;
            }
            else {
                $option = new Option;
                $option->option_key = $optionKey;
                $option->option_title = '' ;
                $option->option_data = $optionData;
            }

            $option->save();
        }
    }
}
