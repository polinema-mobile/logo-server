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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//register n login
Route::post('register', 'UserController@registerUser');
Route::post('login', 'UserController@userLogin');

//config
Route::get('config/{config}','ConfigController@show');
Route::post('config','ConfigController@store');
Route::put('config/{config}','ConfigController@update');
//category
Route::get('category','CategoryController@index');
Route::post('category','CategoryController@store');
Route::get('category/{category}','CategoryController@show');
Route::post('category/{category}','CategoryController@update');
Route::delete('category/{category}','CategoryController@destroy');
//Route::apiResource('category','CategoryController');

//private config
Route::group(['middleware' => 'auth:api'], function() {
    Route::delete('config/{config}','ConfigController@destroy');
    Route::get('config','ConfigController@index');
});
