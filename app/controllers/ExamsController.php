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
      $exams = Exam::with(['test', 'classRoom', 'academicSession'])->paginate(Config::get('view.pagination_limit'));

      return View::make('exams.index', compact('exams'));
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
      $exam = Exam::with('marks')->find($id);

      return View::make('exams.edit', compact('exam'));
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
      //
   }


}
