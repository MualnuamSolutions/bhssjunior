<?php

class ExamsController extends \BaseController
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
        $loggedUser = $this->logged_user;
        $staffGroup = $this->staffGroup;
        $testTable = (new Test)->getTable();
        $examTable = (new Exam)->getTable();
        $subjectTable = (new Subject)->getTable();
        $classRoomTable = (new ClassRoom)->getTable();
        $userTable = (new User)->getTable();
        $assessmentTable = (new Assessment)->getTable();

        $academicSessions = AcademicSession::getDropDownList();
        $assessments = ['' => 'All'] + Assessment::getDropDownList(true);
        $subjects = ['' => 'All'] + Subject::getDropDownList();

        $search = Input::get('s');
        $limit = Input::get('limit', Config::get('view.pagination_limit'));

        $limits = [
            15 => 'Show 15',
            25 => 'Show 25',
            40 => 'Show 40',
            50 => 'Show 50',
            100 => 'Show 100',
        ];

        $exams = Exam::join($testTable, $testTable . '.id', '=', $examTable . '.test_id')
            ->join($subjectTable, $subjectTable . '.id', '=', $testTable . '.subject_id')
            ->join($assessmentTable, $assessmentTable . '.id', '=', $testTable . '.assessment_id')
            ->join($classRoomTable, $classRoomTable . '.id', '=', $examTable . '.class_room_id')
            ->join($userTable, $userTable . '.id', '=', $examTable . '.user_id')
            ->where(function($query) use ($loggedUser, $staffGroup) {
                if($loggedUser->inGroup($staffGroup))
                    $query->where('user_id', '=', $loggedUser->id);
            })
            ->select(
                $examTable . '.id',
                $examTable . '.name',
                $examTable . '.exam_date',
                $examTable . '.user_id',
                $testTable . '.name as testName',
                $classRoomTable . '.name as classRoom',
                $subjectTable . '.name as subject',
                $assessmentTable . '.short_name as assessment',
                $userTable . '.name as teacherName'
            )
            ->orderBy($examTable . '.created_at', 'desc')
            ->paginate($limit);

        return View::make('exams.index', compact('exams', 'orderOptions', 'limits', 'academicSessions', 'assessments', 'subjects'));
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $academicSessions = AcademicSession::getDropDownList();
        $classes = ClassRoom::getDropDownList();
        $assessments = Assessment::getDropDownList();
        $subjects = ClassRoom::getSubjectsJson();

        $exam = Exam::with('marks')->find($id);
        $locked = Result::lockStatus($exam->academic_session_id, $exam->test->assessment_id);

        if($locked && $this->logged_user->inGroup($this->staffGroup))
            Notification::alertInstant('Editing marks is currently locked for ' . $exam->test->assessment->short_name . ' ' . $exam->academicSession->session);

        return View::make('exams.edit', compact('exam', 'locked', 'academicSessions', 'assessments', 'subjects', 'classes'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        $validator = Mark::validator($input);

        if ($validator->passes()) {
            $exam = Exam::find($id);
            $exam->name = $input['name'];
//            $exam->test_id = $input['test_id'];
//            $exam->academic_session_id = $input['academic_session_id'];
//            $exam->class_room_id = $input['class_room_id'];
            $exam->exam_date = $input['exam_date'];
            $exam->note = $input['note'];
            $exam->save();

            $input['exam_id'] = $exam->id;
            $input['update'] = true;

            Mark::store($input);

            Notification::success('Exams marks updated');
            return Redirect::route('exams.index');
        } else {
            return Redirect::route('exams.edit', $id)
                ->withErrors($validator)
                ->withInput();
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
        $exam = Exam::find($id);
        if ($exam) {

            $locked = Result::lockStatus($exam->academic_session_id, $exam->test->assessment_id);
            if($locked) {
                Notification::alert('Cannot be deleted while locked. Records under ' . $exam->test->assessment->short_name . ' ' . $exam->academicSession->session . ' are locked.');
                return Redirect::route('exams.index');
            }

            Mark::where('exam_id', '=', $id)->delete();
            $exam->delete();

            Notification::success('Exam deleted successfully.');
            return Redirect::route('exams.index');
        }
        Notification::alert("Exam not found");
        return Redirect::route('exams.index');
    }

    /**
     * Print test result
     */
    public function printout($id)
    {
        $examTable = (new Exam)->getTable();
        $markTable = (new Mark)->getTable();
        $academicSessionTable = (new AcademicSession)->getTable();
        $assessmentTable = (new Assessment)->getTable();
        $testTable = (new Test)->getTable();
        $classRoomTable = (new ClassRoom)->getTable();
        $userTable = (new User)->getTable();
        $subjectTable = (new Subject)->getTable();
        $studentTable = (new Student)->getTable();

        $exam = Exam::join($academicSessionTable, $academicSessionTable . '.id', '=', $examTable . '.academic_session_id')
            ->join($testTable, $testTable . '.id', '=', $examTable . '.test_id')
            ->join($classRoomTable, $classRoomTable . '.id', '=', $examTable . '.class_room_id')
            ->join($userTable, $userTable . '.id', '=', $examTable . '.user_id')
            ->join($subjectTable, $subjectTable . '.id', '=', $testTable . '.subject_id')
            ->join($assessmentTable, $assessmentTable . '.id', '=', $testTable . '.assessment_id')
            ->select(
                $examTable . '.*',
                $testTable . '.name as testName',
                $testTable . '.totalmarks',
                $academicSessionTable . '.start',
                $academicSessionTable . '.end',
                $classRoomTable . '.name as classRoom',
                $userTable . '.name as teacher',
                $assessmentTable . '.name as assessmentName',
                $subjectTable . '.name as subjectName'
            )
            ->where($examTable . '.id', '=', $id)
            ->first();

        return View::make('exams.print', compact('exam'));
    }


}
