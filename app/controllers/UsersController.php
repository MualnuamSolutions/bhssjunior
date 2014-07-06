<?php

use \Mualnuam\ImageHelper;

class UsersController extends \BaseController
{

    public function __construct()
    {
        //$this->beforeFilter('sentry', ['except' => ['login', 'doLogin', 'logout']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::with('groups')
            ->where('id', '<>', 1)
            ->orderBy('email', 'asc')->paginate();
        $index = $users->getPerPage() * ($users->getCurrentPage() - 1) + 1;
        return View::make('users.index', compact('users', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $userGroup = null;
        return View::make('users.create', compact('userGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            $group = Sentry::findGroupById(Input::get('role'));

            // Move signature & photo file
            $signature = Input::get('signature') ? ImageHelper::store(Input::get('signature')) : null;
            $photo = Input::get('photo') ? ImageHelper::store(Input::get('photo')) : null;

            // Create the user
            $user = Sentry::createUser(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),

                'name' => Input::get('name'),
                'phone' => Input::get('phone'),
                'address' => Input::get('address'),
                'dob' => Input::get('dob'),
                'father' => Input::get('father'),
                'epic_no' => Input::get('epic_no'),
                'date_of_joining' => Input::get('date_of_joining'),
                'qualification' => Input::get('qualification'),
                'professional_training' => Input::get('professional_training'),
                'signature' => $signature,
                'photo' => $photo,

                'activated' => Input::get('activated'),
                'permissions' => []
            ));

            // Assign the group to the user
            $user->addGroup($group);

            Notification::success('User created successfully.');
            return Redirect::route('users.create');

        } else {
            Notification::error('Please correct the following errors.');
            return Redirect::route('users.create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::with('groups')->find($id);
        $userGroup = $user->groups ? $user->groups[0]->id : null;
        return View::make('users.edit', compact('user', 'userGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), User::$updateRules);

        if ($validator->passes()) {
            $group = Sentry::findGroupById(Input::get('role'));

            // Get the user and update
            $user = Sentry::findUserById($id);

            // Move signature & photo file
            if (Input::get('signature')) {
                ImageHelper::remove(public_path($user->signature));
                $user->signature = ImageHelper::store(Input::get('signature'));
            }

            if (Input::get('photo')) {
                ImageHelper::remove(public_path($user->photo));
                $user->photo = ImageHelper::store(Input::get('photo'));
            }

            $user->name = Input::get('name');
            $user->phone = Input::get('phone');
            $user->address = Input::get('address');
            $user->dob = Input::get('dob');
            $user->father = Input::get('father');
            $user->epic_no = Input::get('epic_no');
            $user->date_of_joining = Input::get('date_of_joining');
            $user->qualification = Input::get('qualification');
            $user->professional_training = Input::get('professional_training');
            $user->email = Input::get('email');
            $user->activated = Input::get('activated');

            // Assign the group to the user
            $user->addGroup($group);

            $user->save();

            Notification::success('User updated successfully.');
            return Redirect::route('users.edit', $id);

        } else {
            Notification::error('Please correct the following errors.');
            return Redirect::route('users.edit', $id)
                ->withErrors($validator)
                ->withInput(Input::all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Notification::success('User deleted succesfully.');

        return Redirect::route('users.index', $id);
     }

    /**
     * Show login form
     *
     * @return Response
     */
    public function login()
    {
        return View::make('users.login');
    }

    /**
     * Authenticate user based on credentials
     *
     * @return Response
     */
    public function doLogin()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            try {
                // Set login credentials
                $credentials = array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                );

                // Try to authenticate the user. Set remember flag to false
                Sentry::authenticate($credentials, false);

                if (Sentry::check()) {
                    return Redirect::route('home');
                } else {
                    $this->loginFailed();
                }
            } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                return $this->loginFailed();
            } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                return $this->loginFailed();
            } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
                return $this->loginFailed();
            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                return $this->loginFailed();
            } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
                return $this->loginFailed();
            } // The following is only required if throttle is enabled
            catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
                return $this->loginFailed('suspended');
            } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
                return $this->loginFailed('banned');
            }

        } else {
            return Redirect::route('login')->withErrors($validator);
        }
    }

    public function loginFailed($type = null)
    {
        $error = "Login failed. Please check your credentials.";

        if ($type == 'suspended') {
            $suspension_time = Config::get('cartalyst/sentry::throttling.suspension_time');
            $minutes = $suspension_time > 1 ? 'minutes' : 'minute';
            $error = sprintf('Your account has been suspended due to multiple login attempts. Please try again after %d %s.', $suspension_time, $minutes);
        } elseif ($type == 'banned') {
            $error = "You account has been banned due to security policy. Please contact administrator";
        }

        Notification::error($error);
        return Redirect::route('login');
    }

    public function logout()
    {
        Sentry::logout();
        return Redirect::route('login');
    }

    public function password($id)
    {
        $user = User::with('groups')->find($id);
        $userGroup = $user->groups ? $user->groups[0]->id : null;
        return View::make('users.password', compact('user', 'userGroup'));
    }

    public function updatePassword($id)
    {
        $validator = Validator::make(Input::all(), User::$passwordRules);

        if ($validator->passes()) {

            $user = Sentry::findUserById($id);
            $user->password = Input::get('password');
            $user->save();

            Notification::success('User password changed successfully.');
            return Redirect::route('users.password', $id);
        } else {
            Notification::alert('Please correct the following errors.');
            return Redirect::route('users.password', $id)
                ->withErrors($validator)
                ->withInput(Input::all());
        }
    }

}
