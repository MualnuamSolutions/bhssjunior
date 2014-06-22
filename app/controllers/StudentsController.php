<?php

class StudentsController extends \BaseController {

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
      $students = Student::with('classRoom', 'photos')
         ->orderBy('name', 'asc')
         ->paginate(Config::get('view.pagination_limit'));
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
      $student = new Student;

		if($student->save()) {
         Notification::success('New student created');
         return Redirect::route('students.index');
      }
      else {
         return Redirect::route('students.create')->withErrors($student->errors());
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
      $student = Student::find($id);

      if($student->save()) {
         Notification::success('Student updated');
         return Redirect::route('students.index');
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

   public function uploadPhoto()
   {
      $result = ['status' => '', 'photoPath' => ''];

      if (Input::hasFile('photoFile')) {
         $photo = Input::file('photoFile');
         $hash = md5($photo->getClientOriginalName());
         $extension = $photo->getClientOriginalExtension();
         $fileName = $hash . '.' . $extension;
         $path = chunk_split($hash, 2, '/');
         $uploadDir = public_path('uploads/students/') . $path;
         $tempPhoto = $photo->move($uploadDir, $fileName);
         $result = [
            'status' => 'OK',
            'photoPath' => $path . $fileName,
         ];
      }

      return Response::json($result);
   }
}
