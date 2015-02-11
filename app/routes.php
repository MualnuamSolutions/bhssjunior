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
Route::get('refresh', array('uses' => 'HomeController@refresh', 'as' => 'refresh'));
Route::get('missing', array('uses' => 'HomeController@missing', 'as' => 'missing'));
Route::get('denied', array('uses' => 'HomeController@denied', 'as' => 'denied'));

Route::get('users/{id}/password', array('uses' => 'UsersController@password', 'as' => 'users.password'));
Route::post('users/{id}/password', array('uses' => 'UsersController@updatePassword', 'as' => 'users.updatePassword'));
Route::get('users/profile', array('uses' => 'UsersController@profile', 'as' => 'users.profile'));
Route::post('users/profile', array('uses' => 'UsersController@updateProfile', 'as' => 'users.updateProfile'));
Route::resource('users', 'UsersController');

Route::get('classrooms/{id}/add-students', array('as' => 'classrooms.addstudents', 'uses' => 'ClassRoomsController@addStudents'));
Route::post('classrooms/{id}/add-students', array('as' => 'classrooms.storestudents', 'uses' => 'ClassRoomsController@storeStudents'));
Route::get('classrooms/{id}/students', array('as' => 'classrooms.students', 'uses' => 'ClassRoomsController@students'));
Route::resource('classrooms', 'ClassRoomsController');

Route::resource('exams', 'ExamsController');
Route::get('exams/{id}/print', array('uses' => 'ExamsController@printout', 'as' => 'exams.print'));

Route::resource('result-configuration', 'ResultConfigurationController');

Route::get('results/lock', array('uses' => 'ResultsController@lock', 'as' => 'results.lock', 'before' => 'sentry'));
Route::get('results/unlock', array('uses' => 'ResultsController@unlock', 'as' => 'results.unlock', 'before' => 'sentry'));
Route::resource('results', 'ResultsController');
Route::get('results/{id}/overview', array('uses' => 'ResultsController@overview', 'as' => 'results.overview'));
Route::get('results/{id}/overall', array('uses' => 'ResultsController@overall', 'as' => 'results.overall'));

Route::resource('tests', 'TestsController');

Route::resource('students', 'StudentsController');
Route::get('students/{id}/enrollments', array('uses' => 'StudentsController@enrollments', 'as' => 'students.enrollments'));
Route::get('students/{id}/add-enrollment', array('uses' => 'StudentsController@addEnrollment', 'as' => 'students.addEnrollment'));
Route::post('students/{id}/store-enrollment', array('uses' => 'StudentsController@storeEnrollment', 'as' => 'students.storeEnrollment'));
Route::delete('students/{id}/remove-enrollment', array('uses' => 'StudentsController@removeEnrollment', 'as' => 'students.removeEnrollment'));
Route::get('students/{id}/photos', array('uses' => 'StudentsController@photos', 'as' => 'students.photos'));
Route::get('students/{id}/add-photo', array('uses' => 'StudentsController@addPhoto', 'as' => 'students.addPhoto'));
Route::post('students/{id}/store-photo', array('uses' => 'StudentsController@storePhoto', 'as' => 'students.storePhoto'));
Route::post('students/{id}/remove-photo', array('uses' => 'StudentsController@removePhoto', 'as' => 'students.removePhoto'));
Route::post('students/{id}/default-photo', array('uses' => 'StudentsController@defaultPhoto', 'as' => 'students.defaultPhoto'));
Route::get('students/{id}/measurements', array('uses' => 'StudentsController@measurements', 'as' => 'students.measurements'));
Route::get('students/{id}/add-measurement', array('uses' => 'StudentsController@addMeasurement', 'as' => 'students.addMeasurement'));
Route::post('students/{id}/store-measurement', array('uses' => 'StudentsController@storeMeasurement', 'as' => 'students.storeMeasurement'));
Route::delete('students/{id}/remove-measurement', array('uses' => 'StudentsController@removeMeasurement', 'as' => 'students.removeMeasurement'));

Route::resource('subjects', 'SubjectsController');

Route::resource('academicsessions', 'AcademicSessionsController');

Route::get('assessments/{id}/tests', array('uses' => 'AssessmentsController@tests', 'as' => 'assessments.tests', 'before' => 'sentry'));
Route::get('assessments/{id}/create-test', array('uses' => 'AssessmentsController@createTest', 'as' => 'assessments.createTest', 'before' => 'sentry'));
Route::post('assessments/{id}/tests', array('uses' => 'AssessmentsController@storeTest', 'as' => 'assessments.storeTest', 'before' => 'sentry'));
Route::resource('assessments', 'AssessmentsController');

Route::resource('marks', 'MarksController');

Route::resource('photos', 'PhotosController');

Route::post('/photos/uploader', array('as' => 'photos.uploader', 'uses' => 'PhotosController@uploader'));

Route::resource('parents', 'ParentsController');
Route::post('parents/result', array('as' => 'parents.result', 'uses' => 'ParentsController@result'));

Route::resource('settings', 'SettingsController');

Route::resource('idcards', 'IdcardsController');