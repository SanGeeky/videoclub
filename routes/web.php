<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/login', function () {
//     return view('auth.login');
// });


// Route::get('/logout', function () {
//     return view('logout');
// });

Route::get('/', 'HomeController@getHome');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/catalog', 'CatalogController@getIndex')->name('catalog');

    Route::get('/catalog/show/{id}', 'CatalogController@getShow')->name('catalog.show');
    
    Route::get('/catalog/create', 'CatalogController@getCreate')->name('catalog.create');
    
    Route::get('/catalog/edit/{id}', 'CatalogController@getEdit')->name('catalog.edit');

    Route::post('/catalog/create', 'CatalogController@postCreate');

    Route::put('/catalog/edit/{id}', 'CatalogController@putEdit');

    Route::put('/catalog/rent/{id}', 'CatalogController@putRent');

    Route::put('/catalog/return/{id}', 'CatalogController@putReturn');

    Route::delete('/catalog/delete/{id}', 'CatalogController@deleteMovie');

});
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
