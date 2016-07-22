<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return "olá mundo";
});

Route::get('client','ClientController@index');
Route::post('client','ClientController@store');
Route::put('client/{id}','ClientController@update');
Route::get('client/{id}','ClientController@show');
Route::delete('client/{id}','ClientController@destroy');

Route::get('project/{id}/note','ProjectNoteController@index');
Route::post('project/{id}/note','ProjectNoteController@store');
Route::get('project/{id}/note/{noteId}','ProjectNoteController@show');
Route::put('project/{id}/note/{noteId}','ProjectNoteController@update');
Route::delete('project/{id}/note/{noteId}','ProjectNoteController@delete');

Route::get('project','ProjectController@index');
Route::post('project','ProjectController@store');
Route::put('project/{id}','ProjectController@update');
Route::get('project/{id}','ProjectController@show');
Route::delete('project/{id}','ProjectController@destroy');

Route::get('project/{id}/tasks','ProjectTasksController@index');
Route::post('project/{id}/tasks','ProjectTasksController@store');
Route::get('project/{id}/tasks/{taskId}','ProjectTasksController@show');
Route::put('project/{id}/tasks/{taskId}','ProjectTasksController@update');
Route::delete('project/{id}/tasks/{taskId}','ProjectTasksController@delete');

Route::get('project/{id}/member','ProjectMemberController@index');
Route::post('project/{id}/member','ProjectMemberController@store');
Route::get('project/{id}/member/{memberId}','ProjectMemberController@show');
Route::put('project/{id}/member/{memberId}','ProjectMemberController@update');
Route::delete('project/{id}/member/{memberId}','ProjectMemberController@delete');
