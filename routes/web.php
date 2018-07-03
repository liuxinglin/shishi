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

Route::group(['namespace' => 'Home'], function () {
    //登录注册
    Route::get('/auth/index', 'AuthController@index')->name('auth.index');
    Route::post('/auth/register', 'AuthController@register');
    Route::post('/auth/login', 'AuthController@login');
    Route::group(['middleware' => 'home.auth'], function () {
        Route::get('/members/index', 'MemberController@index');
        Route::post('/members/bindPhone', 'MemberController@bindPhone');
        Route::get('/products/index', 'ProductController@index');
        Route::get('/products/details', 'ProductController@show');


        Route::get('/tryoutProducts/details', 'TryoutProductController@show');
        Route::get('/tryoutProducts/list', 'TryoutProductController@index');
        Route::resource('products', 'ProductController');
        Route::resource('enrolments', 'EnrolmentController');
        Route::post('/enrolments/add', 'EnrolmentController@store');
        Route::get('/enrolments/details', 'EnrolmentController@show');
        Route::post('/votes/add', 'VoteController@store');

        //评论
        Route::post('/comments/add', 'CommentController@store');
        Route::get('/address/create', 'AddressController@create');
        Route::post('/address/add', 'AddressController@store');
        Route::get('/orders/create', 'OrderController@create');
        Route::post('/orders/add', 'OrderController@store');
    });
});


