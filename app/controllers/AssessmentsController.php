<?php

class AssessmentsController extends \BaseController {

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
      $assessments = Assessment::orderBy('name', 'asc')->paginate(Config::get('view.pagination_limit'));
      return View::make('assessments.index', compact('assessments'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('assessments.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
      $assessment = new Assessment;

      if($assessment->save()) {
         Notification::success('New assessment scheme created');
         return Redirect::route('assessments.index');
      }
      else {
         return Redirect::route('assessments.create')->withErrors($assessment->errors());
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
		$assessment = Assessment::find($id);
      return View::make('assessments.edit', compact('assessment'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
      $assessment = Assessment::findOrFail($id);

      if($assessment->save()) {
         Notification::success('Assessment scheme updated');
         return Redirect::route('assessments.index');
      }
      else {
         return Redirect::route('assessments.edit', $id)->withErrors($assessment->errors());
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
		//
	}

}
