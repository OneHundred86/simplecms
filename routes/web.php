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

        // 图片验证码
        Route::get('verify/code', 'VerifyController@imageCode');
        // 登录
        Route::post('/admin/login', 'Admin\AdminController@login');
    }
);

// 站点前台路由
Route::group(
    [
        'prefix' => env('SITE_URL_PREFIX'),
    ],
    function (){
        Route::get('article/list', 'ArticleController@lists');
        Route::get('article/info', 'ArticleController@info');
        Route::get('article/type/list', 'ArticleController@typeList');

        Route::get('index.html', 'SitePageController@index');
        Route::get('about.html', 'SitePageController@about');
        Route::get('product.html', 'SitePageController@product');
        Route::get('article.html', 'SitePageController@article_html');
        Route::get('contact.html', 'SitePageController@contact');
        Route::get('news.html', 'SitePageController@news');
        Route::get('prod_nay.html', 'SitePageController@prod_nay');


        Route::get('category/{id}', 'SitePageController@category')->where('id', '\d+');
        Route::get('article/{id}', 'SitePageController@article')->where('id', '\d+');
    }
);
