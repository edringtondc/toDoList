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

//define resource routes first
Route::resource('task', 'TasksController');

//home page
Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/', function()
{
    return User::all();
});
