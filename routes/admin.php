<?php

// 后台页面
Route::group(
    [
        'middleware' => 'adminPage',
    ],
    function () {
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

        Route::get('/article/list', 'ArticleController@lists');
        Route::get('/article/info', 'ArticleController@info');
        Route::post('/article/add', 'ArticleController@add');
        Route::post('/article/edit', 'ArticleController@edit');
        Route::post('/article/del', 'ArticleController@del');
        Route::post('/article/publish', 'ArticleController@publish');
        Route::post('/article/withdraw', 'ArticleController@withdraw');

        Route::get('/article/type/list', 'ArticleTypeController@lists');
        Route::post('/article/type/add', 'ArticleTypeController@add');
        Route::post('/article/type/edit', 'ArticleTypeController@edit');
        Route::post('/article/type/del', 'ArticleTypeController@del');


        Route::post('/upload/image', 'MaterialController@uploadImage');
        Route::post('/upload/video', 'MaterialController@uploadVideo');

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