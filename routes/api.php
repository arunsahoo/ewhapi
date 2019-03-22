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
    'middleware' => 'auth.apikey'
], function () {
    Route::post('login', 'AuthController@login')->name('api.login');
    Route::post('signup', 'AuthController@signup')->name('api.signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout')->name('api.logout');
    });
    
    Route::resource('user_groups', 'UserGroupController');
    Route::resource('users', 'UserController')->except([
        'create', 'edit'
    ]);
    Route::resource('countries', 'CountryController')->only([
        'index', 'show'
    ]);
});
