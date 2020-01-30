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
    return view('welcome');
});


Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

// Clients Routes
Route::get('index', 'ClientsController@index')->name('admin.clients.index');
Route::get('create', 'ClientsController@create')->name('admin.clients.create');
Route::post('clients', 'ClientsController@store')->name('clients.store');


