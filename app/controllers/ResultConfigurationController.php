<?php

class ResultConfigurationController extends \BaseController {

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
        $academicSessionTable = (new AcademicSession)->getTable();
        $resultConfigurationTable = (new ResultConfiguration)->getTable();

        $limit = Input::get('limit', Config::get('view.pagination_limit'));

		$resultConfigurations = ResultConfiguration::join($academicSessionTable, $academicSessionTable . '.id', '=', $resultConfigurationTable . '.academic_session_id')
            ->orderBy($academicSessionTable . '.start', 'desc')
            ->select(
                $resultConfigurationTable . '.*',
                $academicSessionTable . '.start',
                $academicSessionTable . '.end'
            )
            ->paginate($limit);

        return View::make('result-configuration.index', compact('resultConfigurations'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $assessments = Assessment::orderBy('name', 'asc')->get();
        $academic_sessions = AcademicSession::getDropDownList();

        return View::make('result-configuration.create', compact('assessments', 'academic_sessions'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = ResultConfiguration::validator(Input::all());

        if ($validator->passes()) {
            $input = Input::all();
            ResultConfiguration::store($input);

            Notification::success('New result configuration created');
            return Redirect::route('result-configuration.index');
        } else {
            return Redirect::route('result-configuration.create')
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
        $assessments = Assessment::orderBy('name', 'asc')->get();
        $academicSessions = AcademicSession::getDropDownList();
        $resultConfiguration = ResultConfiguration::with('assessments', 'academicSession')->find($id);

        return View::make('result-configuration.edit', compact('assessments', 'academicSessions', 'resultConfiguration'));

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $validator = ResultConfiguration::validator(Input::all());

        if ($validator->passes()) {
            $input = Input::all();
            $input['id'] = $id;

            ResultConfiguration::store($input, true);

            Notification::success('Result configuration updated');
            return Redirect::route('result-configuration.index');
        } else {
            return Redirect::route('result-configuration.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $resultConfiguration = ResultConfiguration::find($id);

        if($resultConfiguration) {
            $resultConfiguration->assessments()->delete();
            $resultConfiguration->delete();

            Notification::success('Result configuration deleted');
            return Redirect::route('result-configuration.index');
        }
        else {
            Notification::alert('Result configuration not found');
            return Redirect::route('result-configuration.index');
        }
	}


}
