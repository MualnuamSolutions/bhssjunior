<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('before' => 'sentry', 'uses' => 'HomeController@index', 'as' => 'home'));
Route::get('logout', array('uses' => 'UsersController@logout', 'as' => 'logout'));
Route::get('login', array('uses' => 'UsersController@login', 'as' => 'login'));
Route::post('login', array('uses' => 'UsersController@doLogin', 'as' => 'doLogin'));
Route::resource('users', 'UsersController');
Route::get('/refresh', array('uses' => 'HomeController@refresh', 'as' => 'refresh'));
Route::get('classrooms/{id}/add-students', array('as' => 'classrooms.addstudents', 'uses' => 'ClassRoomsController@addStudents'));
Route::post('classrooms/{id}/add-students', array('as' => 'classrooms.storestudents', 'uses' => 'ClassRoomsController@storeStudents'));
Route::get('classrooms/{id}/students', array('as' => 'classrooms.students', 'uses' => 'ClassRoomsController@students'));
Route::resource('classrooms', 'ClassRoomsController');
Route::resource('exams', 'ExamsController');
Route::resource('results', 'ResultsController');
Route::resource('tests', 'TestsController');
Route::post('/students/upload-photo', array('as' => 'students.uploadPhoto', 'uses' => 'StudentsController@uploadPhoto'));
Route::resource('students', 'StudentsController');
Route::resource('subjects', 'SubjectsController');
Route::resource('academicsessions', 'AcademicSessionsController');
Route::get('assessments/{id}/tests', ['uses' => 'AssessmentsController@tests', 'as' => 'assessments.tests', 'before' => 'sentry']);
Route::get('assessments/{id}/create-test', ['uses' => 'AssessmentsController@createTest', 'as' => 'assessments.createTest', 'before' => 'sentry']);
Route::post('assessments/{id}/tests', ['uses' => 'AssessmentsController@storeTest', 'as' => 'assessments.storeTest', 'before' => 'sentry']);
Route::resource('assessments', 'AssessmentsController');
Route::resource('marks', 'MarksController');
