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
        $locked = false;

        $assessment = Input::get('assessment');
        $academicSession = Input::get('academic_session');
        $class = Input::get('class');

        if($assessment && $academicSession && $class) {
            $locked = Result::lockStatus($academicSession, $assessment);
            $assessment = Assessment::find($assessment);
            $academicSession = AcademicSession::find($academicSession);
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

        return View::make('results.index', compact('academicSessions', 'classes', 'assessments', 'students', 'locked'));
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
        $resultConfigTable = (new ResultConfiguration)->getTable();
        $assessmentConfigTable = (new AssessmentConfiguration)->getTable();
        $assessmentTable = (new Assessment)->getTable();

        $assessment = Input::get('assessment');
        $academicSession = Input::get('academic_session');
        $class = Input::get('class');
        $student = Input::get('student');
        $action = Input::get('action');
        $students = [];

        if($assessment && $academicSession && $class) {
            $assessment = Assessment::find($assessment);
            $academicSession = AcademicSession::find($academicSession);
            $class = ClassRoom::find($class);
            $resultConfig = ResultConfiguration::join($assessmentConfigTable, $assessmentConfigTable . '.result_config_id', '=', $resultConfigTable . '.id')
                ->where($resultConfigTable . '.academic_session_id', '=', $academicSession->id)
                ->where($assessmentConfigTable . '.assessment_id', '=', $assessment->id)
                ->first();

            if($action == 'classwise') {
                $results = \Mualnuam\ResultHelper::getAssessmentClassOverview($class->id, $academicSession->id, $assessment->id);
                return View::make('results.classwise', compact('results', 'academicSession', 'class', 'assessment', 'resultConfig'));
            }
            else {
                $resultConfigs = ResultConfiguration::join($assessmentConfigTable, $assessmentConfigTable . '.result_config_id', '=', $resultConfigTable . '.id')
                    ->join($assessmentTable, $assessmentConfigTable . '.assessment_id', '=', $assessmentTable . '.id')
                    ->where($resultConfigTable . '.academic_session_id', '=', $academicSession->id)
                    ->orderBy($assessmentTable . '.order', 'asc')
                    ->get();
                
                $lastAssessment = \Mualnuam\ResultHelper::lastAssessment($academicSession->id, $class->id, 0, 0, $this->externalGroup->id);

                if($assessment && $academicSession && $class) {
                    $students = Enrollment::join($studentTable, $studentTable . '.id', '=', $enrollmentTable . '.student_id')
                        ->where('class_room_id', '=', $class->id)
                        ->where('academic_session_id', '=', $academicSession->id)
                        ->where(function($query) use ($student, $studentTable) {
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

                if($action == 'overall') {
                    return View::make('results.overall', compact('students', 'academicSession', 'assessment', 'class', 'resultConfig', 'lastAssessment', 'resultConfigs'));
                }
                else {
                    return View::make('results.create', compact('students', 'academicSession', 'assessment', 'class', 'resultConfig', 'lastAssessment', 'resultConfigs'));
                }
            }
        }

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
        $assessmentTable = (new Assessment)->getTable();

        $action = Input::get('action');
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

        $resultConfigs = ResultConfiguration::join($assessmentConfigTable, $assessmentConfigTable . '.result_config_id', '=', $resultConfigTable . '.id')
            ->join($assessmentTable, $assessmentConfigTable . '.assessment_id', '=', $assessmentTable . '.id')
            ->where($resultConfigTable . '.academic_session_id', '=', $academicSession->id)
            ->select(
                $assessmentConfigTable . '.weightage',
                $assessmentTable . '.short_name'
            )
            ->orderBy($assessmentTable . '.order', 'asc')
            ->get();

        $schemes = [];
        $schemesTotal = 0;
        foreach($resultConfigs as $config) {
            $schemes[] = $config->short_name . "({$config->weightage}%)";
            $schemesTotal += $config->weightage;
        }

        $lastAssessment = \Mualnuam\ResultHelper::lastAssessment($academicSession->id, $classRoom->id, $student->id);

        switch ($action) {
            case 'classwise':
                $view = 'results.showOverview';
                break;
            
            default:
                $view = 'results.show';
                break;
        }

        return View::make($view, compact(
            'student',
            'academicSession',
            'assessment',
            'classRoom',
            'enrollment',
            'resultConfig',
            'schemes',
            'schemesTotal',
            'lastAssessment'
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

    public function overview($id)
    {
        $classRoom = ClassRoom::find($id);
        $academicSessionId = Input::get('academic_session');
        $assessmentId = Input::get('assessment');
        $action = Input::get('action');
        $excludeGroup = $this->externalGroup->id;

        $testTable = (new Test)->getTable();
        $examTable = (new Exam)->getTable();
        $markTable = (new Mark)->getTable();
        $studentTable = (new Student)->getTable();
        $userTable = (new User)->getTable();

        $marks = Mark::join($examTable, $markTable . '.exam_id', '=', $examTable . '.id')
            ->join($testTable, $examTable . '.test_id', '=', $testTable . '.id')
            ->join($userTable, $examTable . '.user_id', '=', $userTable . '.id')
            ->join($studentTable, $markTable . '.student_id', '=', $studentTable . '.id')
            ->join('users_groups', 'users_groups.user_id', '=', $userTable . '.id')
            ->whereIn($testTable . '.subject_id', $classRoom->subjects()->lists('id'))
            ->where('class_room_id', '=', $classRoom->id)
            ->where('academic_session_id', '=', $academicSessionId)
            ->where(function($q) use ($assessmentId, $excludeGroup) {
                if($assessmentId)
                    $q->where('assessment_id', '=', $assessmentId);
                
                if($excludeGroup)
                    $q->where('users_groups.group_id', '!=', $excludeGroup); // Exclude all marks entered by group
            })
            ->select(
                $markTable . '.student_id',
                DB::raw("SUM({$testTable}.totalmarks) as totalmarks"),
                DB::raw("SUM({$markTable}.mark) as mark")
            )
            ->groupBy('student_id')
            ->orderBy('mark', 'desc')
            ->get();

        $topTen = [];
        $totalPercentage = 0;
        $topPercentage = 100;
        $scores = [];
        $i = 0;

        foreach($marks as $key => $mark) {

            $percentage = round(($mark->mark / $mark->totalmarks) * 100, 2);
            $totalPercentage += $percentage;

            $scores[$mark->student_id] = $percentage;

            if($i < 10) {
                $temp = [
                    'student_id' => $mark->student_id,
                    'percentage' => $percentage
                ];

                if ($topPercentage > $percentage) {
                    $topPercentage = $percentage;
                    ++$i;
                }


                $topTen[$i][] = $temp;
            }
        }

        $classAverage = $marks->count() ? round($totalPercentage / $marks->count(), 2) : 0;
        $classHighest = isset($topTen[1][0])? $topTen[1][0] : 0;
        $percentileRanks = \Mualnuam\ResultHelper::percentileRanks($scores);
    
        $return = [
            'classHighest' => $classHighest['percentage'],
            'classAverage' => $classAverage,
            'topTen' => $topTen,
            'percentileRanks' => $percentileRanks
        ];

        return Response::json($return);
    }

    public function lock()
    {
        $assessment = Input::get('assessment');
        $academicSession = Input::get('academic_session');
        $class = Input::get('class');

        Result::lock($academicSession, $assessment);

        return Redirect::route('results.index', [
            'assessment' => $assessment,
            'academic_session' => $academicSession,
            'class' => $class ]);
    }

    public function unlock()
    {
        $assessment = Input::get('assessment');
        $academicSession = Input::get('academic_session');
        $class = Input::get('class');

        Result::unlock($academicSession, $assessment);

        return Redirect::route('results.index', [
            'assessment' => $assessment,
            'academic_session' => $academicSession,
            'class' => $class ]);
    }

    /**
     * This function is used to calculate individual student overall year result
     *
     * @param  int $id Student ID
     * @return Response
     */
    public function overall($id)
    {
        $resultConfigTable = (new ResultConfiguration)->getTable();
        $assessmentConfigTable = (new AssessmentConfiguration)->getTable();
        $assessmentTable = (new Assessment)->getTable();

        $action = Input::get('action');
        $student = Student::find($id);
        $academicSession = AcademicSession::find(Input::get('academic_session'));
        $assessments = Assessment::all();
        $enrollment = Enrollment::where('academic_session_id', '=', $academicSession->id)
            ->where('student_id', '=', $student->id)
            ->first();
        $classRoom = ClassRoom::find($enrollment->class_room_id);

        $resultConfig = ResultConfiguration::where($resultConfigTable . '.academic_session_id', '=', $academicSession->id)
            ->first();
        $resultConfigs = ResultConfiguration::join($assessmentConfigTable, $assessmentConfigTable . '.result_config_id', '=', $resultConfigTable . '.id')
            ->join($assessmentTable, $assessmentConfigTable . '.assessment_id', '=', $assessmentTable . '.id')
            ->where($resultConfigTable . '.academic_session_id', '=', $academicSession->id)
            ->orderBy($assessmentTable . '.order', 'asc')
            ->get();

        return View::make('results.showOverall', compact(
            'student',
            'academicSession',
            'classRoom',
            'enrollment',
            'resultConfig',
            'resultConfigs'
        ));
    }
}
