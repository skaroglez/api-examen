<?php

  Route::group( [ 'middleware' => ['jwt'] ], function(){ 
    //agricola
    Route::post('categories/list/params', 'Catalogs\CategoriesListController@getByParams');
    Route::post('categories/list', 'Catalogs\CategoriesListController@save');
    Route::put('categories/list/{id}', 'Catalogs\CategoriesListController@update')->where('id', '[0-9]+'); 
    Route::get('categories/list/{id}', 'Catalogs\CategoriesListController@getById')->where('id', '[0-9]+');     
    Route::get('categories/list/actives', 'Catalogs\CategoriesListController@getActives');

    Route::post('product/list/params', 'Catalogs\ProductListController@getByParams');
    Route::post('product/list', 'Catalogs\ProductListController@save');
    Route::put('product/list/{id}', 'Catalogs\ProductListController@update')->where('id', '[0-9]+'); 
    Route::get('product/list/{id}', 'Catalogs\ProductListController@getById')->where('id', '[0-9]+');     
    Route::get('product/list/actives', 'Catalogs\ProductListController@getActives');
    Route::get('product/list/actives/byIdCategory/{idCategory}', 'Catalogs\ProductListController@getActivesByIdCategory');

    Route::post('employees/list/params', 'Catalogs\EmployeesListController@getByParams');
    Route::post('employees/list', 'Catalogs\EmployeesListController@save');
    Route::put('employees/list/{id}', 'Catalogs\EmployeesListController@update')->where('id', '[0-9]+'); 
    Route::get('employees/list/{id}', 'Catalogs\EmployeesListController@getById')->where('id', '[0-9]+');     
    Route::get('employees/list/actives', 'Catalogs\EmployeesListController@getActives');

    Route::get('jobs/actives', 'Catalogs\JobsController@getActives');

    Route::get('documents/employees/{id}', 'Catalogs\EmployeeDocumentController@getById');
    Route::get('documents/employees/download', 'Catalogs\EmployeeDocumentController@getDocument');
    Route::post('documents/employees', 'Catalogs\EmployeeDocumentController@save');
    Route::post('documents/employees/edit', 'Catalogs\EmployeeDocumentController@update');
    Route::post('documents/employees/deleteIMG', 'Catalogs\EmployeeDocumentController@deleteImg');

    Route::get('documents/categories/{id}', 'Catalogs\CategoryDocumentController@getById');
    Route::get('documents/categories/download', 'Catalogs\CategoryDocumentController@getDocument');
    Route::post('documents/categories', 'Catalogs\CategoryDocumentController@save');
    Route::post('documents/categories/edit', 'Catalogs\CategoryDocumentController@update');
    Route::post('documents/categories/deleteIMG', 'Catalogs\CategoryDocumentController@deleteImg');

    Route::post('documents/products', 'Catalogs\ProductDocumentController@save');
    Route::post('documents/products/deleteIMG', 'Catalogs\ProductDocumentController@deleteImg');
    Route::get('documents/products/getAllById/{id}', 'Catalogs\ProductDocumentController@getAllById');
  });
