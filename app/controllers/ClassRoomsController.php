<?php

class ClassRoomsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
      $classrooms = ClassRoom::orderBy('name', 'desc')->paginate(Config::get('view.pagination_limit'));
		return View::make('classrooms.index', compact('classrooms'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
      $subjects = Subject::orderBy('name', 'asc')->lists('name', 'id');
		return View::make('classrooms.create', compact('subjects'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
      $classroom = new ClassRoom;
      if($classroom->save()) {
         Notification::success('New class room created');
         return Redirect::route('classrooms.index');
      }
      else {
         return Redirect::route('classrooms.create')->withErrors($classroom->errors());
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
		$classroom = ClassRoom::with(array('subjects', 'students' => function($query){
         // $query->whereAcademicSessionId(1);
         $query->orderBy('roll_no', 'asc');
         // return $query;
      }))->find($id);

      $students = $classroom->students;

      if ( !empty($students) ) {
         $academicSession = AcademicSession::find($students->first()->pivot->academic_session_id);
      }

      return View::make('classrooms.show', compact('classroom', 'students', 'academicSession'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
      $classroom = ClassRoom::find($id);
      $subjects = Subject::orderBy('name', 'asc')->lists('name', 'id');
		return View::make('classrooms.edit', compact('classroom', 'subjects'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
      $classroom = ClassRoom::find($id);

      if($classroom->save()) {
         Notification::success('Class room updated');
         return Redirect::route('classrooms.index');
      }
      else {
         return Redirect::route('classrooms.edit', $id)->withErrors($classroom->errors());
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

   public function students($id)
   {
      dd($id);
   }

   public function addStudents($id)
   {
      dd($id);
   }

   public function storeStudents($id)
   {
      dd($id);
   }
}
