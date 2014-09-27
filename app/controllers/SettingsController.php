<?php

class SettingsController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('sentry');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $settings = Option::get()->lists('option_data', 'option_key');
        $assessments = Assessment::getDropDownList();
        $academicSessions = AcademicSession::getDropDownList();

		return View::make('settings.index', compact('settings', 'assessments', 'academicSessions'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Option::validator(Input::all());

        if ($validator->passes()) {
            $input = Input::all();
            Option::store($input);

            Notification::success('Settings updated successfully');
            return Redirect::route('settings.index');
        } else {
            return Redirect::route('settings.index')
                ->withErrors($validator)
                ->withInput();
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


}
