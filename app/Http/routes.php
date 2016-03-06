<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('layout/html');
});*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get(
        '/',
        'UserController@index'
    );
    Route::get(
        '/devices',
        'DeviceController@index'
    );
    Route::get(
        '/borrow/user/{user_id}',
        'BorrowController@user'
    );
    Route::post(
        '/return/stab',
        'ReturnController@stab'
    );
    Route::post(
        '/return/regulator',
        'ReturnController@regulator'
    );
    Route::post(
        '/return/block',
        'ReturnController@block'
    );
    Route::post(
        '/borrow/device',
        'BorrowController@device'
    );
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
