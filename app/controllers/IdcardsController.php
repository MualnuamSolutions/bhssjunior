<?php

class IdcardsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $studentTable = (new Student)->getTable();
        $enrollmentTable = (new Enrollment)->getTable();
		
		$academicSessions = AcademicSession::getDropDownList();
		$classes = array('' => 'Select Class') + ClassRoom::getDropDownList();
		$students = [];

        $academicSession = Input::get('academic_session');
        $class = Input::get('class');

		if($academicSession && $class) {
            $academicSession = ClassRoom::find($academicSession);
            $class = ClassRoom::find($class);

            if($academicSession && $class) {
                $students = Enrollment::join($studentTable, $studentTable . '.id', '=', $enrollmentTable . '.student_id')
                    ->where('class_room_id', '=', $class->id)
                    ->where('academic_session_id', '=', $academicSession->id)
                    ->orderBy('roll_no', 'asc')
                    ->select($studentTable.'.id', DB::raw("CONCAT({$enrollmentTable}.roll_no, '. ', {$studentTable}.name) as name") )
                    ->get()->lists('name', 'id');
            }
            else {
                Notification::alert('Invalid selection, please try again');
                return Redirect::route('results.index');
            }
        }

		return View::make('idcards.index', compact('academicSessions', 'classes', 'students'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$studentTable = (new Student)->getTable();
        $enrollmentTable = (new Enrollment)->getTable();
		
		$academicSessions = AcademicSession::getDropDownList();
		$classes = array('' => 'Select Class') + ClassRoom::getDropDownList();
		$students = [];

        $academicSession = Input::get('academic_session');
        $class = Input::get('class');

		if($academicSession && $class) {
            $academicSession = ClassRoom::find($academicSession);
            $class = ClassRoom::find($class);

            if($academicSession && $class) {
                $students = Enrollment::join($studentTable, $studentTable . '.id', '=', $enrollmentTable . '.student_id')
                    ->where('class_room_id', '=', $class->id)
                    ->where('academic_session_id', '=', $academicSession->id)
                    ->orderBy('roll_no', 'asc')
                    ->select($studentTable.'.id', DB::raw("CONCAT({$enrollmentTable}.roll_no, '. ', {$studentTable}.name) as name") )
                    ->get()->lists('name', 'id');
            }
            else {
                Notification::alert('Invalid selection, please try again');
                return Redirect::route('results.index');
            }
        }

		return View::make('idcards.create', compact('academicSessions', 'classes', 'students'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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


}
