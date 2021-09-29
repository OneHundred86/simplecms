<?php

// 后台页面
Route::group(
    [
        'middleware' => 'adminPage',
    ],
    function () {
        Route::get('/', 'AdminController@index')->name('adminIndex');
    }
);

// 用户接口
Route::group(
    [
        'middleware' => 'adminApi:user',
    ],
    function () {
        Route::get('/self/user/info', 'SelfController@userInfo');
        Route::get('/logout', 'AdminController@logout');

        Route::get('/category/list', 'CategoryController@lists');
        Route::get('/category/info', 'CategoryController@info');
        Route::post('/category/add', 'CategoryController@add');
        Route::post('/category/edit', 'CategoryController@edit');
        Route::post('/category/del', 'CategoryController@del');

        Route::get('/article/list', 'ArticleController@lists');
        Route::get('/article/info', 'ArticleController@info');
        Route::post('/article/add', 'ArticleController@add');
        Route::post('/article/edit', 'ArticleController@edit');
        Route::post('/article/del', 'ArticleController@del');
        Route::post('/article/pub', 'ArticleController@publish');
        Route::post('/article/withdraw', 'ArticleController@withdraw');

        Route::any('/ueditor/upload', 'UEditorController@upload');
    }
);

// 超管接口
Route::group(
    [
        'middleware' => 'adminApi:super',
        'prefix' => 'super'
    ], 
    function () {
    }
);