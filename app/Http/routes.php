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

/*Route::group(['middleware' => ['web']], function () {
    Route::get(
        '/',
        'HomeController@index'
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
});*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get( '/', 'HomeController@index');
    Route::get( '/devices', 'DeviceController@index');
    Route::get( '/borrow/user/{user_id}', 'BorrowController@user');
    Route::post( '/return/stab', 'ReturnController@stab');
    Route::post( '/return/regulator', 'ReturnController@regulator');
    Route::post( '/return/tank', 'ReturnController@tank');
    Route::post( '/borrow/device', 'BorrowController@device');

    Route::get('/admin', 'Admin\HomeController@index');
    Route::group(
        [
            'middleware' => 'auth',
            'prefix' => 'admin',
            'namespace' => 'Admin'
        ],
        function() {
            // Tanks
            Route::get('tank','TankController@index');
            Route::get('tank/history','TankController@history');
            Route::get( 'tank/edit/{tank_id}','TankController@edit');
            Route::get('tank/add','TankController@add');
            Route::get('tank/buy','TankController@buy_history');
            Route::post( 'tank/create', 'TankController@store');
            Route::put( 'tank/update', 'TankController@update');
            Route::patch( 'tank/update', 'TankController@update');
            Route::delete( 'tank/destroy/{tank_id}', 'TankController@destroy');
            //TIV
            Route::get('tank/tiv/{tank_id}', 'TivController@tivs');
            Route::get('tank/tiv/add/{tank_id}', 'TivController@add');
            Route::get( 'tank/tiv/edit/{tiv_id}','TivController@edit');
            Route::get('tank/tiv/detail/{tiv_id}', 'TivController@detail');
            Route::post('tank/tiv/store', 'TivController@store');
            Route::put( 'tank/tiv/update', 'TivController@update');
            Route::patch( 'tank/tiv/update', 'TivController@update');
            Route::get('tank/tiv/pdf/{tiv_id}', 'TivController@pdf');
            Route::get('tank/tiv', 'TivController@dashboard');
            // Stabs
            Route::get( 'stab', 'StabController@index');
            Route::get( 'stab/history', 'StabController@history');
            Route::get( 'stab/edit/{stab_id}', 'StabController@edit');
            Route::get( 'stab/add', 'StabController@add');
            Route::post( 'stab/create', 'StabController@store');
            Route::put( 'stab/update', 'StabController@update');
            Route::patch( 'stab/update', 'StabController@update');
            //Route::post( 'stab/store', 'StabController@store');
            Route::get( 'stab/buy', 'StabController@buy_history');
            Route::delete( 'stab/destroy/{stab_id}', 'StabController@destroy');
            // Regulators
            Route::get( 'regulator', 'RegulatorController@index');
            Route::get( 'regulator/history', 'RegulatorController@history');
            Route::get( 'regulator/edit/{regulator_id}', 'RegulatorController@edit');
            Route::get( 'regulator/add', 'RegulatorController@add');
            Route::get( 'regulator/buy', 'RegulatorController@buy_history');
            Route::post( 'regulator/create', 'RegulatorController@store');
            Route::put( 'regulator/update', 'RegulatorController@update');
            Route::patch( 'regulator/update', 'RegulatorController@update');
            //Route::post( 'regulator/store', 'RegulatorController@store');
            Route::delete( 'regulator/destroy/{regulator_id}', 'RegulatorController@destroy');
            // Users
            Route::get( 'user', 'UserController@index');
            Route::get( 'user/edit/{user_id}', 'UserController@edit');
            Route::get( 'user/add', 'UserController@add');
            Route::post( 'user/store', 'UserController@store');
            Route::delete( 'user/destroy/{user_id}', 'UserController@destroy');

            /*Route::get('user/history',             'UserController@history');

            Route::get('user/add',                 'UserController@add');
            Route::post('user/store',              'UserController@store');*/
    });
});
