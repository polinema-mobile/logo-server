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

Route::post('register', 'UserController@registerUser');

Route::post('login', 'UserController@userLogin');


//Route::resource('config','ConfigController');
Route::get('config/{config}','ConfigController@show');
Route::post('config','ConfigController@store');
Route::put('config/{config}','ConfigController@update');

Route::group(['middleware' => 'auth:api'], function() {
    Route::delete('config/{config}','ConfigController@destroy');
    Route::get('config','ConfigController@index');
});
