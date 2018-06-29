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

//List Users
Route::get('users', 'UserController@index');

//List Single User
Route::get('user/{id}', 'UserController@show');

//Create New User
Route::post('user', 'UserController@store');

//Update User
Route::put('user', 'UserController@store');

//Delete user
Route::delete('user/{id}', 'UserController@destroy');

//List Countries
Route::get('countries', 'CountryController@index');

//List Single Country
Route::get('country/{id}', 'CountryController@show');
