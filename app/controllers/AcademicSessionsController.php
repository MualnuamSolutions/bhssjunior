<?php

class AcademicSessionsController extends \BaseController {

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
      $academicsessions = AcademicSession::orderBy('start', 'desc')->paginate(Config::get('view.pagination_limit'));
		return View::make('academicsessions.index', compact('academicsessions'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('academicsessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
      $academicsession = new AcademicSession;

      if($academicsession->save()) {
         Notification::success('New academic session created');
         return Redirect::route('academicsessions.index');
      }
      else {
         return Redirect::route('academicsessions.create')->withErrors($academicsession->errors());
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
      $academicsession = AcademicSession::find($id);
		return View::make('academicsessions.edit', compact('academicsession'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
      $academicsession = AcademicSession::find($id);

      if($academicsession->save()) {
         Notification::success('Academic session updated');
         return Redirect::route('academicsessions.index');
      }
      else {
         return Redirect::route('academicsessions.edit', $id)->withErrors($academicsession->errors());
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
      $academicsession = AcademicSession::find($id);
      if($academicsession->delete()) {
         Notification::success('Academic session deleted');
         return Redirect::route('academicsessions.index');
      }
      else {
         return Redirect::route('academicsessions.index')->withErrors($academicsession->errors());
      }
	}


}
