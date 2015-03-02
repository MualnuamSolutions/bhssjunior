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
        $currentAcademicSession = $academicSession = Input::get('academic_session', AcademicSession::currentSession()->id);
        $academicSessions = AcademicSession::getDropDownList();
        
        $classrooms = ClassRoom::data($academicSession, $limit = Config::get('view.pagination_limit'));

        return View::make('classrooms.index', compact('classrooms', 'academicSessions', 'currentAcademicSession'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $subjects = Subject::lists('name', 'id');

        $staffs = array('' => 'Select Staff') + User::getStaff();

        return View::make('classrooms.create', compact('subjects', 'staffs'));
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
        $currentAcademicSession = AcademicSession::currentSession();

        $classroom = ClassRoom::with(array('subjects', 'enrollments' => function ($query) use ($currentAcademicSession) {
            $query->with('student');
            $query->whereAcademicSessionId($currentAcademicSession->id);
            $query->orderBy('roll_no', 'asc');
        }))->find($id);

        $enrollments = $classroom->enrollments;

        return View::make('classrooms.show', compact('classroom', 'enrollments', 'currentAcademicSession'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $classroom = ClassRoom::with('subjects')->find($id);
        $classroomSubjects = [];
        foreach($classroom->subjects as $subject)
            $classroomSubjects[] = $subject->id;

        $staffs = array('' => 'Select Staff') + User::getStaff();

        $subjects = Subject::orderBy('name', 'asc')->lists('name', 'id');
        return View::make('classrooms.edit', compact('classroom', 'subjects', 'classroomSubjects', 'staffs'));
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
            return Redirect::route('classrooms.edit', $id);
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
