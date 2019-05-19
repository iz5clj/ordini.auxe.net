<?php
use App\Http\Controllers\UserController;

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

// Route::middleware(['auth'])->group(function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('utenti', 'UserController@index')->name('users');

    Route::get('info', 'InfoController@index')->name('info');

// });

Auth::routes();
