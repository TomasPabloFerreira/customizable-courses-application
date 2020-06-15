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

Route::get('/user', 'UserController@index')->name('user.index');

Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');

Route::get('/user/create', 'UserController@create')->name('user.create');

Route::post('/user', 'UserController@store')->name('user.store');

Route::put('/user/{id}', 'UserController@update')->name('user.update');

Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');

// Course

Route::get('/course', 'CourseController@index')->name('course.index');

Route::get('/course/{id}', 'CourseController@show')->name('course.show');

Route::get('/course/{id}/edit', 'CourseController@edit')->name('course.edit');

Route::get('/course/create', 'CourseController@create')->name('course.create');

Route::post('/course', 'CourseController@store')->name('course.store');

Route::put('/course/{id}', 'CourseController@update')->name('course.update');

Route::delete('/course/{id}', 'CourseController@destroy')->name('course.destroy');

// Course Section

Route::get('/course/{courseId}/section', 'CourseSectionController@index')->name('course.section.index');

Route::get('/course/{courseId}/section/{id}/edit', 'CourseSectionController@edit')->name('course.section.edit');

Route::get('/course/{courseId}/section/create', 'CourseSectionController@create')->name('course.section.create');

Route::post('/course/{courseId}/section', 'CourseSectionController@store')->name('course.section.store');

Route::put('/course/{courseId}/section/{id}', 'CourseSectionController@update')->name('course.section.update');

Route::delete('/course/{courseId}/section/{id}', 'CourseSectionController@destroy')->name('course.section.destroy');

// Lesson

Route::get('/course/{courseId}/section/{sectionId}/lesson', 'LessonController@index')->name('lesson.index');

Route::get('/course/{courseId}/section/{sectionId}/lesson/{id}/edit', 'LessonController@edit')->name('lesson.edit');

Route::get('/course/{courseId}/section/{sectionId}/lesson/create', 'LessonController@create')->name('lesson.create');

Route::post('/course/{courseId}/section/{sectionId}/lesson', 'LessonController@store')->name('lesson.store');

Route::put('/course/{courseId}/section/{sectionId}/lesson/{id}', 'LessonController@update')->name('lesson.update');

Route::delete('/course/{courseId}/section/{sectionId}/lesson/{id}', 'LessonController@destroy')->name('lesson.destroy');
