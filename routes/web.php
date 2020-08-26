<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/viewStudentIndex', [
   'uses' => 'DashboardController@viewStudentIndex',
   'as' => 'dashboard.viewStudentIndex'
]);

Route::get('/viewTeacherIndex', [
   'uses' => 'DashboardController@viewTeacherIndex',
   'as' => 'dashboard.viewTeacherIndex'
]);

Route::get('/editStudentView/{id}', [
   'uses' => 'StudentController@editStudentView',
   'as' => 'student.editStudentView'
]);

Route::post('/editStudent', [
   'uses' => 'StudentController@editStudent',
   'as' => 'student.editStudent'
]);

Route::get('/addStudentView', [
   'uses' => 'StudentController@addStudentView',
   'as' => 'student.addStudentView'
]);

Route::post('/addStudent', [
   'uses' => 'StudentController@addStudent',
   'as' => 'student.addStudent'
]);

Route::get('/deleteStudent/{id}', [
   'uses' => 'StudentController@deleteStudent',
   'as' => 'student.deleteStudent'
]);
