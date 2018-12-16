<?php
if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'root', 'uses' => 'PageController@getIndex']);
Route::get('a/{aSlug}', ['as' => 'book', 'uses' => 'PageController@getBook']);
Route::get('p/{pSlug}', ['as' => 'page', 'uses' => 'PageController@getPage']);
Route::get('c/{cSlug}', ['as' => 'category', 'uses' => 'PageController@getCategory']);
Route::get('sitemap.xml', ['as' => 'sitemap', 'uses' => 'PageController@getSitemap']);
Route::get('filebrowser/scan', '\Crowles\FileBrowser\FileBrowserController@scan');
Route::get('filebrowser/', '\Crowles\FileBrowser\FileBrowserController@index');
Route::get('/categories', ['as' => 'categories.all', 'uses' => 'PageController@getCategories']);
