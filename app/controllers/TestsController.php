<?php

class TestsController extends \BaseController
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
      $tests = Test::orderBy('name', 'desc')->paginate(Config::get('view.pagination_limit'));
      return View::make('tests.index', compact('tests'));
   }


   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
      $assessments = Assessment::getDropDownList();
      $subjects = Subject::getDropDownList();

      return View::make('tests.create', compact('assessments', 'subjects'));
   }


   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store()
   {
      $test = new Test;

      if ($test->save()) {
         Notification::success('New test created');
         return Redirect::route('tests.index');
      } else {
         return Redirect::route('tests.create')->withErrors($test->errors());
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
      $test = Test::findOrFail($id);
      $assessments = Assessment::getDropDownList();
      $subjects = Subject::getDropDownList();

      return View::make('tests.edit', compact('assessments', 'subjects', 'test'));
   }


   /**
    * Update the specified resource in storage.
    *
    * @param  int $id
    * @return Response
    */
   public function update($id)
   {
      $test = Test::findOrFail($id);

      if ($test->save()) {
         Notification::success('Test updated');
         return Redirect::route('tests.index');
      } else {
         return Redirect::route('tests.edit', $test->id)->withErrors($test->errors());
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
      if (Test::destroy($id)) {
         Notification::success('Test deleted');
         return Redirect::route('tests.index');
      } else {
         Notification::alert('Test delete failed');
         return Redirect::route('tests.index');
      }
   }


}
