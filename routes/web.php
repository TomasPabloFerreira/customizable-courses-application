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

Route::get('/user', 'UserController@index')->name('user.index');

Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');

Route::get('/user/create', 'UserController@create')->name('user.create');

Route::post('/user', 'UserController@store')->name('user.store');

Route::put('/user/{id}', 'UserController@update')->name('user.update');

Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');

Route::get('/course', 'CourseController@index')->name('course.index');
