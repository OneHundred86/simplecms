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

// public
Route::group(
    [
    ],
    function () {
        // debug
        Route::any('debug/session', 'DebugController@session');
        Route::any('debug/login', 'DebugController@login');
        //
        Route::get('verify/code', 'VerifyController@imageCode');
        Route::get('/admin/login', 'Admin\AdminController@loginPage')->name('adminLogin');
        Route::post('/admin/login', 'Admin\AdminController@login');
    }
);


Route::group(
    [
        'middleware' => ['adminPage'],
        'prefix' => 'admin',
        'namespace' => 'Admin',
    ], function () {
        Route::get('/index', 'AdminController@index')->name('adminIndex');
        Route::get('/logout', 'AdminController@logout');
    }
);

Route::group(
    [
        'middleware' => ['adminApi'],
        'prefix' => 'admin',
        'namespace' => 'Admin',
    ], function () {

    }
);