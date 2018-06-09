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

Route::group(['namespace' => 'Backend', 'prefix' => 'backend'], function () {
    //登录注册
    Route::get('/login', ['as' => 'backend.login', 'uses' => 'AuthController@toLogin']);
    Route::post('/login', ['as' => 'backend.login', 'uses' => 'AuthController@login']);
    Route::get('/logout', ['as' => 'backend.logout', 'uses' => 'AuthController@logout']);
    //首页
    Route::get('/index', ['as' => 'backend.index', 'uses' => 'IndexController@index']);
    Route::get('/main', ['as' => 'backend.main', 'uses' => 'IndexController@main']);

    Route::resource('emails', 'EmailController');
    Route::resource('promoters', 'PromoterController');
});

Route::group(['namespace' => 'Game', 'prefix' => 'game'], function () {
    //登录注册
    Route::get('/register', ['as' => 'game.to_reg', 'uses' => 'UserController@toReg']);
    Route::post('/register', ['as' => 'game.to_reg', 'uses' => 'UserController@add']);
    Route::get('/modifyPwd', ['as' => 'game.modify_pwd', 'uses' => 'UserController@toModifyPwd']);
    Route::post('/modifyPwd', ['as' => 'game.modify_pwd', 'uses' => 'UserController@modifyPwd']);

    Route::post('/sendEmail', ['as' => 'game.send_email', 'uses' => 'UserController@sendEmail']);
    Route::get('/getBackPwd', ['as' => 'game.get_back_pwd', 'uses' => 'UserController@toGetBackPwd']);
    Route::post('/getBackPwd', ['as' => 'game.get_back_pwd', 'uses' => 'UserController@getBackPwd']);
});

//推广员系统
Route::group(['namespace' => 'Promoter', 'prefix' => 'promoter'], function () {
    //登录注册
    Route::get('/login', ['as' => 'prom.login', 'uses' => 'AuthController@toLogin']);
    Route::post('/login', ['as' => 'prom.login', 'uses' => 'AuthController@login']);
    Route::get('/logout', ['as' => 'prom.logout', 'uses' => 'AuthController@logout']);
    //首页
    Route::get('/index', ['as' => 'prom.index', 'uses' => 'IndexController@index']);
    Route::get('/main', ['as' => 'prom.main', 'uses' => 'IndexController@main']);
    Route::resource('comsFlows', 'ComsFlowController');
});
