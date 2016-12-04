<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/search','SearchController@search');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/test', 'StudentController@test');
Route::resource('/student/search', 'StudentController@search');
Route::resource('/student', 'StudentController');
Route::resource('/classroom', 'ClassroomController');











