<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Eloquent
{

    public static $rules = [
        'email' => 'required',
        'password' => 'required|alpha_num|between:4,8|confirmed',
        'password_confirmation' => 'required|alpha_num|between:4,8',
        'name' => 'required',
        'phone' => 'numeric',
        'permissions' => [],
    ];

    public static $passwordRules = [
        'password' => 'required|alpha_num|between:4,8|confirmed',
        'password_confirmation' => 'required|alpha_num|between:4,8',
    ];

    public static $updateRules = [
        'email' => 'required',
        'name' => 'required',
        'phone' => 'numeric',
        'permissions' => [],
    ];

    public static $profileRules = [
        'email' => 'required',
        'password' => 'alpha_num|between:4,8|confirmed',
        'password_confirmation' => 'alpha_num|between:4,8',
        'name' => 'required',
        'phone' => 'numeric',
        'permissions' => []
    ];

    public static $roles = [1 => 'Admin', 2 => 'Staff'];

    public function groups()
    {
        return $this->belongsToMany('Group', 'users_groups', 'user_id', 'group_id')->orderBy('name', 'asc');
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }


}
