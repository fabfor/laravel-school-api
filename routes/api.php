<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Controller Studente */
Route::get('/studente', 'StudentController@list');
Route::post('/studente', 'StudentController@create');
Route::delete('/studente/{id}', 'StudentController@delete');
// Da sistemare!
// Route::put('/studente/{id}', 'StudentController@edit');

Route::get('/insegnante', 'TeacherController@list');
Route::get('/corso', 'CourseController@list');
Route::get('/corso/{id}', 'CourseController@detail');
