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

Route::group([ 'prefix' => 'auth', ], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

// Route::group([ 'middleware' => ['jwt'], ], function(){
    // Route::get('menus', 'configuracion\MenuController@index');
    // Route::get('menus', 'configuracion\MenuController@getAll');
    // Route::get('modulos/{id}', 'configuracion\ModuloController@getModuloByUser');
    // Route::get('modulos/{id}', 'configuracion\ModuloController@getModuloByUser');

    // Route::get('users', 'Administration\UserController@getAll');
    // Route::get('users/{nombre}', 'Administration\UserController@getUserByName');
// });
