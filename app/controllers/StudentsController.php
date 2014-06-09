<?php

class StudentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
      $students = Student::orderBy('name', 'asc')->paginate(Config::get('view.pagination_limit'));
		return View::make('students.index', compact('students'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
      $classRooms = ClassRoom::orderBy('name', 'asc')->lists('name', 'id');
      $academicSessions = AcademicSession::getSessionsForDropdown();
		return View::make('students.create', compact('classRooms', 'academicSessions'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if((new Student)->save()) {
         Notification::success('New student created');
         return Redirect::route('students.index');
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
      $student = Student::find($id);
      $classRooms = ClassRoom::orderBy('name', 'asc')->lists('name', 'id');
      $academicSessions = AcademicSession::getSessionsForDropdown();
      return View::make('students.edit', compact('student', 'academicSessions', 'classRooms'));
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

   public function uploadPhoto()
   {
      $result = ['status' => '', 'photoPath' => ''];

      if (Input::hasFile('photoFile')) {
         $photo = Input::file('photoFile');
         $tempDir = Config::get('assets.temp');
         $tempPhoto = $photo->move($tempDir, $photo->getClientOriginalName());
         $result = [
         'status' => 'OK',
         'photoPath' => $tempPhoto->getRealPath(),
         ];
      }

      return Response::json($result);
   }
}
