<?php

class ResultsController extends \BaseController
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
        $studentTable = (new Student)->getTable();
        $enrollmentTable = (new Enrollment)->getTable();

        $academicSessions = AcademicSession::getDropDownList();
        $classes = array('' => 'Select Class') + ClassRoom::getDropDownList();
        $assessments = Assessment::getDropDownList(true);
        $students = [];

        $assessment = Input::get('assessment');
        $academicSession = Input::get('academic_session');
        $class = Input::get('class');

        if($assessment && $academicSession && $class) {
            $assessment = Assessment::find($assessment);
            $academicSession = ClassRoom::find($academicSession);
            $class = ClassRoom::find($class);

            if($assessment && $academicSession && $class) {
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

        return View::make('results.index', compact('academicSessions', 'classes', 'assessments', 'students'));
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

        $assessment = Input::get('assessment');
        $academicSession = Input::get('academic_session');
        $class = Input::get('class');
        $student = Input::get('student');
        $students = [];

        if($assessment && $academicSession && $class) {
            $assessment = Assessment::find($assessment);
            $academicSession = ClassRoom::find($academicSession);
            $class = ClassRoom::find($class);

            if($assessment && $academicSession && $class) {
                $students = Enrollment::join($studentTable, $studentTable . '.id', '=', $enrollmentTable . '.student_id')
                    ->where('class_room_id', '=', $class->id)
                    ->where('academic_session_id', '=', $academicSession->id)
                    ->where(function($query) use ($student) {
                        if($student != 0)
                            $query->where($studentTable . '.id', '=', $student);
                    })
                    ->orderBy('roll_no', 'asc')
                    ->select($studentTable.'.id', $enrollmentTable . '.roll_no', $studentTable . '.name', $studentTable . '.regno')
                    ->get();
            }
            else {
                Notification::alert('Invalid selection, please try again');
                return Redirect::route('results.index');
            }
        }

        return View::make('results.create', compact('students', 'academicSession', 'assessment'));
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
     * This function is used to calculate individual student result
     *
     * @param  int $id Student ID
     * @return Response
     */
    public function show($id)
    {
        $resultConfigTable = (new ResultConfiguration)->getTable();
        $assessmentConfigTable = (new AssessmentConfiguration)->getTable();

        $student = Student::find($id);
        $academicSession = AcademicSession::find(Input::get('academic_session'));
        $assessment = Assessment::find(Input::get('assessment'));
        $enrollment = Enrollment::where('academic_session_id', '=', $academicSession->id)
            ->where('student_id', '=', $student->id)
            ->first();
        $classRoom = ClassRoom::find($enrollment->class_room_id);

        $resultConfig = ResultConfiguration::join($assessmentConfigTable, $assessmentConfigTable . '.result_config_id', '=', $resultConfigTable . '.id')
            ->where($resultConfigTable . '.academic_session_id', '=', $academicSession->id)
            ->where($assessmentConfigTable . '.assessment_id', '=', $assessment->id)
            ->first();



        return View::make('results.show', compact(
            'student',
            'academicSession',
            'assessment',
            'classRoom',
            'enrollment',
            'resultConfig'
        ));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
    }

}
