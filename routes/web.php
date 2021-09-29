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
    return view('welcome', ['name' => 'world', 'test' => 'abc']);
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

// 站点前台路由
Route::group(
    [
        'prefix' => env('SITE_URL_PREFIX'),
    ],
    function (){
        Route::get('about.html', 'SitePageController@about');
        Route::get('product.html', 'SitePageController@product');
        Route::get('article.html', 'SitePageController@article');
        Route::get('contact.html', 'SitePageController@contact');
        Route::get('news.html', 'SitePageController@news');
        Route::get('index.html', 'SitePageController@index');
        Route::get('prod_nay.html', 'SitePageController@prod_nay');


        Route::get('category/{id}', 'SitePageController@category')->where('id', '\d+');
        Route::get('article/{id}', 'SitePageController@article')->where('id', '\d+');
        // 该路由一定要放在最下面
        Route::any('{path}', 'SitePageController@route')->where('path', '.*');
    }
);


//Route::group(
//    [
//        'middleware' => ['adminPage'],
//        'prefix' => 'admin',
//        'namespace' => 'Admin',
//    ], function () {
//        Route::get('/', 'AdminController@index')->name('adminIndex');
//    }
//);

//Route::group(
//    [
//        'middleware' => ['adminApi:user'],
//        'prefix' => 'admin',
//        'namespace' => 'Admin',
//    ], function () {
//        Route::get('/logout', 'AdminController@logout');
//
//        Route::get('/self/user/info', 'SelfController@userInfo');
//        Route::get('/category/list', 'CategoryController@lists');
//        Route::get('/category/info', 'CategoryController@info');
//        Route::post('/category/add', 'CategoryController@add');
//        Route::post('/category/edit', 'CategoryController@edit');
//        Route::post('/category/del', 'CategoryController@del');
//
//        Route::get('/article/list', 'ArticleController@lists');
//        Route::get('/article/');
//
//        Route::any('/ueditor/upload', 'UEditorController@upload');
//    }
//);