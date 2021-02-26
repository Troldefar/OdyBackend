<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::get('/group', 'App\Http\Controllers\Group\GroupController@index');    
    /**
     * Group
     * @return $group
    */
});