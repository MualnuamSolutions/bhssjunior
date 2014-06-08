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

Route::get('/', ['before' => 'sentry', 'uses' => 'HomeController@index', 'as' => 'home']);
Route::get('logout', ['uses' => 'UsersController@logout', 'as' => 'logout']);
Route::get('login', ['uses' => 'UsersController@login', 'as' => 'login']);
Route::post('login', ['uses' => 'UsersController@doLogin', 'as' => 'doLogin']);
Route::resource('user', 'UserController');
Route::get('/refresh', ['uses' => 'HomeController@refresh', 'as' => 'refresh']);
Route::resource('classrooms', 'ClassRoomsController');
Route::resource('exams', 'ExamsController');
Route::resource('results', 'ResultsController');
Route::resource('tests', 'TestsController');
Route::post('/students/upload-photo', ['as' => 'students.uploadPhoto', 'uses' => 'StudentsController@uploadPhoto']);
Route::resource('students', 'StudentsController');
Route::resource('subjects', 'SubjectsController');
Route::resource('academicsessions', 'AcademicSessionsController');
