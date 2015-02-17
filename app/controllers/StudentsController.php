<?php
use \Mualnuam\ImageHelper;

class StudentsController extends \BaseController
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
        $academicSessionTable = (new AcademicSession)->getTable();
        $classRoomTable = (new ClassRoom)->getTable();

        $search = Input::get('s');
        $order = Input::get('order', 'name');
        $limit = Input::get('limit', Config::get('view.pagination_limit'));

        $orderOptions = [
            'name' => 'Order by Name Alphabetically',
            'id' => 'Order By Recently Added',
            'regno' => 'Order By Reg. No',
        ];

        $limits = [
            15 => 'Show 15',
            25 => 'Show 25',
            40 => 'Show 40',
            50 => 'Show 50',
            100 => 'Show 100',
        ];

        $orderDirection = [
            'name' => 'asc',
            'id' => 'desc',
            'regno' => 'asc'
        ];

        $students = Student::where(function($query) use ($search, $studentTable) {
                if($search != "") {
                    $query->where($studentTable . '.name', 'LIKE', '%' . $search . '%');
                    $query->orWhere($studentTable . '.father', 'LIKE', '%' . $search . '%');
                    $query->orWhere($studentTable . '.regno', 'LIKE', '%' . $search . '%');
                    $query->orWhere($studentTable . '.contact1', 'LIKE', $search . '%');
                }
            })
            ->groupBy($studentTable . '.id')
            ->orderBy($studentTable . '.' . $order, $orderDirection[$order])
            ->select(
                $studentTable . '.id',
                $studentTable . '.regno',
                $studentTable . '.name',
                $studentTable . '.father',
                $studentTable . '.contact1'
            )
            ->paginate($limit);

        return View::make('students.index', compact('students', 'orderOptions', 'limits'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $classRooms = ClassRoom::orderBy('name', 'asc')->lists('name', 'id');
        $academicSessions = AcademicSession::getDropDownList();
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

        if ($student->save()) {
            Notification::success('New student created');
            return Redirect::route('students.index');
        } else {
            return Redirect::route('students.create', $student->id)->withErrors($student->errors());
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
        $student = Student::find($id);
        $enrollments = Enrollment::with('academicSession', 'classRoom')->whereStudentId($student->id)->paginate();
        $photos = Photo::whereStudentId($student->id)->orderBy('created_at', 'desc')->paginate();
        $measurements = Measurement::get($student->id, $paginate = false);

        $classRooms = ClassRoom::orderBy('name', 'asc')->lists('name', 'id');

        return View::make('students.show', compact('student', 'classRooms', 'enrollments', 'photos', 'measurements'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $classRooms = ClassRoom::orderBy('name', 'asc')->lists('name', 'id');
        $academicSessions = AcademicSession::getDropDownList();
        return View::make('students.edit', compact('student', 'academicSessions', 'classRooms'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $student = Student::find($id);

        if ($student->save()) {
            Notification::success('Student updated');
            return Redirect::route('students.edit', $id);
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
        
    }

    public function enrollments($id)
    {
        $student = Student::find($id);
        $enrollments = Enrollment::with('academicSession', 'classRoom')
            ->where('student_id', '=', $id)->paginate();

        return View::make('students.enrollments', compact('enrollments', 'student'));
    }

    /*public function editEnrollment($id)
    {
        $enrollment = Enrollment::find($id);
        $student = Student::find($enrollment->student_id);
        $classRooms = ClassRoom::orderBy('name', 'asc')->lists('name', 'id');
        $academicSessions = AcademicSession::getDropDownList();

        return View::make('students.editEnrollment', compact('enrollment', 'student', 'academicSessions', 'classRooms'));
    }*/

    public function addEnrollment($id)
    {
        $student = Student::find($id);
        $classRooms = ClassRoom::orderBy('name', 'asc')->lists('name', 'id');
        $academicSessions = AcademicSession::getDropDownList();

        return View::make('students.addenrollment', compact('student', 'academicSessions', 'classRooms'));
    }

    public function storeEnrollment($id)
    {
        $student = Student::find($id);
        $enrollment = new Enrollment;
        $enrollment->student_id = $student->id;

        if ($enrollment->save()) {
            Notification::success('New enrollment created for ' . $student->name);
            return Redirect::route('students.enrollments', $student->id);
        } else {
            return Redirect::route('students.addEnrollment', $student->id)->withErrors($enrollment->errors());
        }
    }

    public function removeEnrollment($id)
    {
        $enrollment = Enrollment::find($id);
        $student = Student::find($enrollment->student_id);

        if ($enrollment->delete()) {
            Notification::success('Enrollment record removed for ' . $student->name);
            return Redirect::route('students.enrollments', $student->id);
        } else {
            Notification::alert('Enrollment record cannot be removed.');
            return Redirect::route('students.enrollments', $student->id);
        }
    }

    public function photos($id)
    {
        $student = Student::find($id);
        $photos = Photo::orderBy('created_at', 'desc')->where('student_id', '=', $id)->paginate();

        return View::make('students.photos', compact('photos', 'student'));
    }

    public function defaultPhoto($id)
    {
        $student = Student::find($id);
        $photo = Photo::find(Input::get('default'));

        if($photo) {
            Photo::where('student_id', '=', $student->id)->update(['default' => 0]);

            $photo->default = 1;
            $photo->save();

            Notification::success('Default photo updated successfully.');
            return Redirect::route('students.photos', $student->id);
        }
        else {
            Notification::alert('Setting default photo failed. Photo not found');
            return Redirect::route('students.photos', $student->id);
        }
    }

    public function addPhoto($id)
    {
        $student = Student::find($id);

        return View::make('students.addphoto', compact('student'));
    }

    public function storePhoto($id)
    {
        $student = Student::find($id);

        Photo::where('student_id', '=', $student->id)->update(['default' => 0]);

        $photo = new Photo;
        $photo->path = ImageHelper::store(Input::get('photo'));
        $photo->student_id = $student->id;
        $photo->default = 1;
        $photo->save();

        Notification::success('New photo uploaded successfully.');
        return Redirect::route('students.photos', $student->id);
    }

    public function removePhoto($id)
    {
        $student = Student::find($id);
        $photo = Photo::find(Input::get('delete'));
        if($photo) {
            ImageHelper::remove(public_path($photo->path));

            if($photo->default) {
                $photo->delete();

                Photo::where('student_id', '=', $student->id)->update(['default' => 0]);

                $photo = Photo::orderBy('created_at', 'desc')->where('student_id', '=', $student->id)->first();
                $photo->default = 1;
                $photo->save();
            }
            else {
                $photo->delete();
            }

            Notification::success('Photo deleted successfully.');
            return Redirect::route('students.photos', $student->id);
        }
        else {
            Notification::alert('Delete photo failed. Photo not found');
            return Redirect::route('students.photos', $student->id);
        }
    }

    public function measurements($id)
    {
        $student = Student::find($id);
        $measurements = Measurement::get($student->id, $paginate = true);

        return View::make('students.measurements', compact('measurements', 'student'));
    }

    public function addMeasurement($id)
    {
        $student = Student::find($id);
        $academicSessions = AcademicSession::getDropDownList();

        return View::make('students.addmeasurement', compact('student', 'academicSessions'));
    }

    public function storeMeasurement($id)
    {
        $student = Student::find($id);
        $measurement = new Measurement;
        $measurement->student_id = $student->id;

        if ($measurement->save()) {
            Notification::success('New measurement added for ' . $student->name);
            return Redirect::route('students.measurements', $student->id);
        } else {
            return Redirect::route('students.addMeasurement', $student->id)->withErrors($measurement->errors());
        }
    }

    public function removeMeasurement($id)
    {
        $measurement = Measurement::find($id);
        $student = Student::find($measurement->student_id);

        if ($measurement->delete()) {
            Notification::success('Measurement record removed for ' . $student->name);
            return Redirect::route('students.measurements', $student->id);
        } else {
            Notification::alert('Measurement record cannot be removed.');
            return Redirect::route('students.measurements', $student->id);
        }

    }

}
