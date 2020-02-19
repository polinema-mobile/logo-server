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
Route::post('category','CategoryController@store');
Route::get('category/{category}','CategoryController@show');
Route::post('category/{category}','CategoryController@update');
//Route::apiResource('category','CategoryController');

//wallpaper
Route::post('wallpaper','WallpaperController@store');
Route::get('wallpaper/{wallpaper}','WallpaperController@show');
Route::post('wallpaper/{wallpaper}','WallpaperController@update');
Route::delete('wallpaper/{wallpaper}','WallpaperController@destroy');
Route::get('wallpaper','WallpaperController@index');
//private
Route::group(['middleware' => 'auth:api'], function() {
    //config
    Route::delete('config/{config}','ConfigController@destroy');
    Route::get('config','ConfigController@index');
    //category
    Route::delete('category/{category}','CategoryController@destroy');
    Route::get('category','CategoryController@index');
});
