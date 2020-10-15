<?php
 Route::group( [ 'middleware' => ['jwt'] ], function(){
        Route::get('modules', 'Configuration\ModuleController@getAll');
        Route::get('modules/{id}', 'Configuration\ModuleController@getById');
        Route::post('modules/params', 'Configuration\ModuleController@getByParams');
        Route::post('modules', 'Configuration\ModuleController@save');
        Route::put('modules/{id}', 'Configuration\ModuleController@update');

        Route::get('menuOptions', 'Configuration\MenuOptionController@getAll');
        Route::get('menuOptions/{id}', 'Configuration\MenuOptionController@getById');
        Route::post('menuOptions/params', 'Configuration\MenuOptionController@getByParams');
        Route::post('menuOptions', 'Configuration\MenuOptionController@save');
        Route::put('menuOptions/{id}', 'Configuration\MenuOptionController@update');
        

        Route::get('statuses', 'Configuration\StatusController@getAll');
        Route::get('statuses/{id}', 'Configuration\StatusController@getById');
        Route::post('statuses', 'Configuration\StatusController@save');
        Route::put('statuses/{id}', 'Configuration\StatusController@update');
   

        Route::get('accesses', 'Configuration\AccessController@index');
        Route::post('accesses/params', 'Configuration\AccessController@params');
        Route::post('accesses', 'Configuration\AccessController@store');
        Route::delete('accesses/{idAccess}', 'Configuration\AccessController@delete');
        
      
       Route::get('menuOptionRole/{idRole}', 'Configuration\MenuOptionRoleController@getByRole');     
       Route::post('menuOptionRole', 'Configuration\MenuOptionRoleController@save');     
       Route::delete('menuOptionRole/{idMenuOptionRole}', 'Configuration\MenuOptionRoleController@delete');     

       Route::get('menuOptionRolePermissionType/{idRole}', 'Configuration\MenuOptionRolePermissionTypeController@getByRole');     
       Route::post('menuOptionRolePermissionType', 'Configuration\MenuOptionRolePermissionTypeController@save');     
       Route::delete('menuOptionRolePermissionType/{idMenuOptionRole}', 'Configuration\MenuOptionRolePermissionTypeController@delete');    

       Route::post('accesses/permissions', 'Configuration\AccessController@storePermission');

       Route::get('permissionsTypes/actives', 'Configuration\permissionTypeController@getActives');

       
      Route::get('schedules/actives', 'Configuration\SchedulesController@getActives');
 });

 