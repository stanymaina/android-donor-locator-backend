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

Route::get('check-auth', function () {
    if (Auth::check()) {
        return response()->json([
            'success' => true,
            'message' => 'Authentication Successful.'
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Authentication Unsuccessful.'
        ]);
    }
});
// Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('dashboard');
