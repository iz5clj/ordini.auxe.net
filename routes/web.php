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

Route::get('install',[
    'as'   => 'create-super-admin',
    'uses' => 'SuperAdminController@showForm',
]);
Route::post('install',[
    'as'   => 'save-super-admin-data',
    'uses' => 'SuperAdminController@saveData',
]);

Route::get('/', function () {
    return view('home');
});

Route::get('info',[
    'as'   => 'info',
    'uses' => 'InfoController@index'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
