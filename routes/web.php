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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User

Route::get('/user', 'UserController@index')->name('user.index')->middleware('admin');

Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit')->middleware('admin');

Route::get('/user/create', 'UserController@create')->name('user.create')->middleware('admin');

Route::post('/user', 'UserController@store')->name('user.store')->middleware('admin');

Route::put('/user/{id}', 'UserController@update')->name('user.update')->middleware('admin');

Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy')->middleware('admin');

// Course

Route::get('/course', 'CourseController@index')->name('course.index')->middleware('admin');

Route::get('/course/create', 'CourseController@create')->name('course.create')->middleware('admin');

Route::post('/course', 'CourseController@store')->name('course.store')->middleware('admin');

Route::get('/course/{id}', 'CourseController@show')
	->name('course.show')
	->middleware('course.access');

Route::get('/course/{id}/edit', 'CourseController@edit')->name('course.edit')->middleware('admin');

Route::put('/course/{id}', 'CourseController@update')->name('course.update')->middleware('admin');

Route::delete('/course/{id}', 'CourseController@destroy')->name('course.destroy')->middleware('admin');

// Course Acquisition

Route::get('/course-acquisition', 'CourseAcquisitionController@index')
	->name('course.acquisition.index')
	->middleware('admin');

Route::get('/course-acquisition/create', 'CourseAcquisitionController@create')
	->name('course.acquisition.create')
	->middleware('admin');

Route::post('/course-acquisition', 'CourseAcquisitionController@store')
	->name('course.acquisition.store')
	->middleware('admin');

Route::delete('/course-acquisition/{id}', 'CourseAcquisitionController@destroy')
	->name('course.acquisition.destroy')
	->middleware('admin');

// Course Section

Route::get('/course/{courseId}/section', 'CourseSectionController@index')->name('course.section.index')->middleware('admin');

Route::get('/course/{courseId}/section/{id}/edit', 'CourseSectionController@edit')->name('course.section.edit')->middleware('admin');

Route::get('/course/{courseId}/section/create', 'CourseSectionController@create')->name('course.section.create')->middleware('admin');

Route::post('/course/{courseId}/section', 'CourseSectionController@store')->name('course.section.store')->middleware('admin');

Route::put('/course/{courseId}/section/{id}', 'CourseSectionController@update')->name('course.section.update')->middleware('admin');

Route::delete('/course/{courseId}/section/{id}', 'CourseSectionController@destroy')->name('course.section.destroy')->middleware('admin');

// Lesson

Route::get('/course/{courseId}/section/{sectionId}/lesson', 'LessonController@index')->name('lesson.index')->middleware('admin');

Route::get('/course/{courseId}/section/{sectionId}/lesson/create', 'LessonController@create')->name('lesson.create')->middleware('admin');

Route::post('/course/{courseId}/section/{sectionId}/lesson', 'LessonController@store')->name('lesson.store')->middleware('admin');

Route::get(
	'/course/{courseId}/section/{sectionId}/lesson/{id}',
	'LessonController@show'
)
	->name('lesson.show')
	->middleware('course.access');

Route::get('/course/{courseId}/section/{sectionId}/lesson/{id}/edit', 'LessonController@edit')->name('lesson.edit')->middleware('admin');

Route::put('/course/{courseId}/section/{sectionId}/lesson/{id}', 'LessonController@update')->name('lesson.update')->middleware('admin');

Route::delete('/course/{courseId}/section/{sectionId}/lesson/{id}', 'LessonController@destroy')->name('lesson.destroy')->middleware('admin');
