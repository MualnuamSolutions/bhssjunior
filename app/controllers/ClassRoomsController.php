<?php

class ClassRoomsController extends \BaseController
{

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
        $classrooms = ClassRoom::with('subjects', 'enrollments')
            ->orderBy('id', 'asc')->paginate(Config::get('view.pagination_limit'));

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
        if ($classroom->save()) {
            Notification::success('New class room created');
            return Redirect::route('classrooms.index');
        } else {
            return Redirect::route('classrooms.create')->withErrors($classroom->errors());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $recentAcademicSession = AcademicSession::getRecentSession();

        $classroom = ClassRoom::with(array('subjects', 'enrollments' => function ($query) use ($recentAcademicSession) {
            $query->with('student');
            $query->whereAcademicSessionId($recentAcademicSession->id);
            $query->orderBy('roll_no', 'asc');
        }))->find($id);

        $enrollments = $classroom->enrollments;

        return View::make('classrooms.show', compact('classroom', 'enrollments', 'recentAcademicSession'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $classroom = ClassRoom::find($id);

        if ($classroom->save()) {
            Notification::success('Class room updated');
            return Redirect::route('classrooms.index');
        } else {
            return Redirect::route('classrooms.edit', $id)->withErrors($classroom->errors());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function students($id)
    {
        $academicSession = AcademicSession::getRecentSession();

        $classroom = ClassRoom::with(array('subjects', 'enrollments' => function ($query) use ($academicSession) {
            $query->with('student');
            $query->whereAcademicSessionId($academicSession->id);
            $query->orderBy('roll_no', 'asc');
        }))->find($id);

        $enrollments = $classroom->enrollments;

        return View::make('classrooms.students', compact('classroom', 'enrollments', 'academicSession'));
    }

    public function addStudents($id)
    {
        $classroom = ClassRoom::find($id);
        $classRooms = ClassRoom::orderBy('name', 'asc')->lists('name', 'id');
        $academicSessions = AcademicSession::getDropDownList();

        return View::make('classrooms.addstudents', compact('classroom', 'classRooms', 'academicSessions'));
    }

    public function storeStudents($id)
    {
        dd($id);
    }
}
