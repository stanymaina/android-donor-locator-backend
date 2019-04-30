<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

Route::resource('users', 'UsersController');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'Api\UserController@details');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('nodes', 'NodesController');
Route::resource('nodes', 'NodesController');
Route::resource('farms', 'FarmsController');
Route::resource('payloads', 'PayloadController');
Route::get('stats/dailyData', 'StatisticsController@dailyData');
Route::get('stats/averageStat', 'StatisticsController@dailyData');
Route::get('stats/dailyData', 'StatisticsController@dailyData');
Route::get('stats/dailyData', 'StatisticsController@dailyData');
