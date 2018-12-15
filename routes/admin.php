<?php

Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@getIndex']);
Route::resource('book', 'BookController');
Route::resource('category', 'CategoryController');
Route::resource('page', 'PageController');
Route::resource('user', 'UserController');
//Route::get('admin/books/create', ['as' => 'admin.Book.store', 'uses' => 'BookController@create']);
