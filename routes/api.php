<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'App\Http\Controllers\Auth\SessionController@index');

Route::group([
  'middleware' => 'api',
  'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\Auth\SessionController@login');
    Route::apiResource('auth', 'App\Http\Controllers\Auth\SessionController');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'user'
], function($router) {
    Route::post('register', 'App\Http\Controllers\user\UserController@create');
    Route::post('update', 'App\Http\Controllers\user\UserController@update');
    Route::apiResource('user', 'App\Http\Controllers\User\UserController');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'group'
], function($router) {
    Route::apiResource('group', 'App\Http\Controllers\Group\GroupController');    
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'guild'
], function($router) {
    Route::apiResource('guild', 'App\Http\Controllers\Guild\GuildController');  
});

Route::fallback(function() {
  return response()->json('Resource not found', 404);
});