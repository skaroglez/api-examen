<?php

      Route::group( [ 'middleware' => ['jwt'] ], function(){
         Route::get('roles', 'Administration\RoleController@getAll');
        Route::get('roles/actives', 'Administration\RoleController@getActives');
        Route::post('roles/params', 'Administration\RoleController@getByParams');
        Route::post('roles', 'Administration\RoleController@save');
        Route::put('roles/{id}', 'Administration\RoleController@update');

        Route::get('users', 'Administration\UserController@getAll');
        Route::get('users/{id}', 'Administration\UserController@getById')->where('id', '[0-9]+');
        Route::post('users/params', 'Administration\UserController@getByParams');
        Route::get('users/name/{name}', 'Administration\UserController@getByName')->where('name', '[a-zA-Z0-9]+');
        Route::post('users', 'Administration\UserController@save');
        Route::put('users/{id}', 'Administration\UserController@update')->where('id', '[0-9]+');      

         });