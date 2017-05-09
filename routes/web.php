<?php

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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    //root url
    Route::get('/home', 'HomeController@index')->name('home');

    //add task
    Route::get('add-task/',  [
        'as' => 'task.add', 'uses' => 'TaskController@addTask'
    ]);

    //get single task
    Route::get('task/{id}',  [
        'as' => 'task.viewtask', 'uses' => 'TaskController@getTask'
    ]);

    //create task
    Route::post('task-create',  [
        'as' => 'task.task-create', 'uses' => 'TaskController@addTaskPost'
    ]);


    //delete task
    Route::get('/task/{id}/delete', [
        'as' => 'task.delete', 'uses' => 'TaskController@deleteTask'
    ]);

    //start task
    Route::get('/task/{id}/start', [
        'as' => 'task.start', 'uses' => 'TaskController@startTask'
    ]);

    //complete task
    Route::get('/task/{id}/complete', [
        'as' => 'task.complete', 'uses' => 'TaskController@completeTask'
    ]);


});