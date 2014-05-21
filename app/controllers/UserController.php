<?php

class UserController extends \BaseController {

   public function __construct()
   {
      // $this->beforeFilter('sentry');
   }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
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
         $group = Sentry::findGroupByName(Input::get('role'));
         $public_group = Sentry::findGroupByName('Public');

         // Create the user
          $user = Sentry::createUser(array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'phone' => Input::get('phone'),
            'address' => Input::get('address'),
            'activated' => Input::get('activated'),
            'permissions' => []
         ));

         // Assign the group to the user
         $user->addGroup($group);
         // We assign every user to public group by default.
         $user->addGroup($public_group);

         return Redirect::route('user.create')
            ->with('success', "User created successfully.");

      } else {
         return Redirect::route('user.create')
            ->with('info', "Please correct the following errors.")
            ->withErrors($validator)
            ->withInput(Input::all());
      }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


   /**
    * Show login form
    *
    * @return Response
    */
   public function login()
   {
      return View::make('user.login');
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

      if($validator->passes()) {
         $error = "Login failed. Please check your credentials.";
         try
         {
            // Set login credentials
            $credentials = array(
               'email' => Input::get('email'),
               'password' => Input::get('password')
            );

            // Try to authenticate the user. Set remember flag to false
            $user = Sentry::authenticate($credentials, false);

            if(Sentry::check()) {
               return Redirect::route('home');
            } else {
               $this->loginFailed();
            }
         }
         catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
         {
             $this->loginFailed();
         }
         catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
         {
            $this->loginFailed();
         }
         catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
         {
             $this->loginFailed();
         }
         catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
         {
             $this->loginFailed();
         }
         catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
         {
             $this->loginFailed();
         }
         // The following is only required if throttle is enabled
         catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
         {
            $this->loginFailed('suspended');
         }
         catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
         {
             $this->loginFailed('banned');
         }

      } else {
         return Redirect::route('user.login')->withErrors($validator);
      }
   }

   private function loginFailed($type = null)
   {
      $error = "Login failed. Please check your credentials.";

      if ($type == 'suspended') {
         $suspension_time = Config::get('cartalyst/sentry::throttling.suspension_time');
         $minutes = $suspension_time>1?'minutes':'minute';
         $error = sprintf('Your account has been suspended due to multiple login attempts. Please try again after %d %s.', $suspension_time, $minutes);

      } elseif ($type == 'suspended') {
         $error = "You account has been banned due to security policy. Please contact administrator";
      }

      return Redirect::route('user.login')->with('error', $error);
   }

  public function logout()
  {
    Sentry::logout();
    return Redirect::route('user.login');
  }

}
