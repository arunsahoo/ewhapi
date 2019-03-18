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
// Auth::routes();

//404 Page Not Found.
Route::fallback(function(){
    return response()->json(['error' => "NotFoundError: This route don't exist!"], 404);
})->name('api.fallback.404');

//Authorization api
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('api.login');
    Route::post('signup', 'AuthController@signup')->name('api.signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout')->name('api.logout');
        // Route::get('user', 'AuthController@user');
    });
});

Route::group([
    'middleware' => 'auth.apikey' //authenticate api request with apikey.
], function () {
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
Route::get('countries', 'CountryController@index')->name('api.countryList');

//List Single Country
Route::get('country/{id}', 'CountryController@show')->name('api.singleCountry');
});
