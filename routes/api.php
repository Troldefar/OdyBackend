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
    /**
     * Session
     * @return $sessionvars
    */
    Route::post('/login', 'App\Http\Controllers\Auth\SessionController@login');
    Route::post('/register', 'App\Http\Controllers\User\UserController@create');
    Route::post('/logout', 'App\Http\Controllers\Auth\SessionController@logout');
    Route::post('/refresh', 'App\Http\Controllers\Auth\SessionController@refresh');
    /**
     * Session
     * @return $user
    */
    Route::get('/me', 'App\Http\Controllers\User\UserController@me');
    /**
     * Group
     * @return $group
    */
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'group'
], function($router) {
    /**
     * Group
     * @return $group
    */
    Route::get('/', 'App\Http\Controllers\Group\GroupController@index');
    Route::get('/group/{group}', 'App\Http\Controllers\Group\GroupController@show');    
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'guild'
], function($router) {
    /**
     * Group
     * @return $guild
    */
    Route::get('/', 'App\Http\Controllers\Guild\GuildController@index');
    Route::get('/guild/{guild}', 'App\Http\Controllers\Guild\GuildController@show');    
});

Route::fallback(function() {
  return response()->json('Resource not found', 404);
});