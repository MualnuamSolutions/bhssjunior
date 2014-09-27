<?php

class MarksController extends \BaseController
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
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $academicSessions = AcademicSession::getDropDownList();
        $classes = ClassRoom::getDropDownList();
        $assessments = Assessment::getDropDownList();
        $subjects = ClassRoom::getSubjectsJson();

        $input = Input::all();
        $enrollments = [];
        $tests = [];
        $classroom = null;
        $locked = false;

        if (!empty($input)) {
            $classroom = ClassRoom::with(array('subjects', 'enrollments' => function ($query) use ($input) {
                $query->with('student');
                $query->whereAcademicSessionId($input['academic_session_id']);
                $query->orderBy('roll_no', 'asc');
            }))->find($input['class_room_id']);

            $enrollments = $classroom->enrollments;

            $tests = Test::getDropDownList($input);
            $subject = Subject::find($input['subject_id']);
            $assessment = Assessment::find($input['assessment_id']);
            $academicSession = AcademicSession::find($input['academic_session_id']);

            $locked = Result::lockStatus($input['academic_session_id'], $assessment->id);

            if($locked)
                Notification::alertInstant('Mark entry is currently locked for ' . $assessment->short_name . ' ' . $academicSession->session);

        }

        return View::make('marks.create', compact('assessments',
            'classes', 'subjects', 'academicSessions', 'input', 'enrollments', 'tests', 'subject', 'assessment', 'locked'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Mark::validator(Input::all());

        if ($validator->passes()) {
            $input = Input::all();
            Exam::store($input);

            Notification::success('New exam marks entry completed');
            return Redirect::route('exams.index');
        } else {
            return Redirect::route('marks.create', [
                    'academic_session_id' => Input::get('academic_session_id'),
                    'subject_id' => Input::get('subject_id'),
                    'class_room_id' => Input::get('class_room_id'),
                    'assessment_id' => Input::get('assessment_id')
                ])
                ->withErrors($validator)
                ->withInput();
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
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
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


}
