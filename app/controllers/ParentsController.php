<?php

class ParentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $student = null;
        $marks = null;
        $notfound = false;

        if(Input::get('regno') && Input::get('contact1')) {
            $student = Student::where('regno', '=', Input::get('regno'))
                ->where('contact1', '=', Input::get('contact1'))
                ->first();
            if($student) {
                $marks = Mark::join('exams', 'exams_marks.exam_id', '=', 'exams.id')
                    ->join('users', 'exams.user_id', '=', 'users.id')
                    ->join('tests', 'exams.test_id', '=', 'tests.id')
                    ->join('subjects', 'tests.subject_id', '=', 'subjects.id')
                    ->where('exams_marks.student_id', '=', $student->id)
                    ->select('exams.*', 'exams_marks.*', 'tests.name as test_name', 'users.name as teacher_name', 'subjects.name as subject_name')
                    ->get();
            }
            else {
                $notfound = true;
            }

        }

        return View::make('parents.index', compact('student', 'marks', 'notfound'));
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
