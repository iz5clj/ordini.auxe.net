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

Route::middleware(['auth'])->group(function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('users', 'UserController@index')->name('users');
    Route::get('/user/create', 'UserController@create')->name('userCreateForm');
    Route::post('/user/store', 'UserController@store')->name('userStore');
    Route::get('/user/{user}', 'UserController@modify')->name('userModify');
    Route::put('/user/{user}', 'UserController@update')->name('userUpdate');
    Route::delete('/user/{user}', 'UserController@destroy')->name('userDestroy');


    Route::get('roles', 'RoleController@index')->name('roles');
    Route::get('/role/create', 'RoleController@create')->name('roleCreateForm');
    Route::post('/role/store', 'RoleController@store')->name('roleStore');
    Route::get('/role/{role}', 'RoleController@modify')->name('roleModify');
    Route::put('/role/{role}', 'RoleController@update')->name('roleUpdate');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('roleDestroy');

    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('/permission/create', 'PermissionController@create')->name('permissionCreateForm');
    Route::post('/permission/store', 'PermissionController@store')->name('permissionStore');
    Route::get('/permission/{permission}', 'PermissionController@modify')->name('permissionModify');
    Route::put('/permission/{permission}', 'PermissionController@update')->name('permissionUpdate');
    Route::delete('/permission/{permission}', 'PermissionController@destroy')->name('permissionDestroy');

    Route::get('logs', 'LogController@index')->name('logs');

    Route::get('info', 'InfoController@index')->name('info');
    Route::get('phpinfo', 'InfoController@phpinfo')->name('phpinfo');

});

Auth::routes();
