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
use App\Project;

Route::get('/', function () {
    return view('welcome')->with('projects', Project::all());
});

Route::get('/home/{id}', 'TaskController@index')->name('home');
Route::post('/reorder', 'TaskController@reorder')->name('reorder');;

Route::resource('tasks', 'TaskController')->only([
    'create', 'store', 'edit', 'update', 'destroy'
]);

Route::resource('tasks', 'TaskController')->except([
    'index', 'reorder'
]);

