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
// Route::get('v1/catalog', 'APICatalogController@index');

// Route::get('v1/catalog/{id}', 'APICatalogController@show');


Route::apiResource('v1/catalog', 'API\APICatalogController',
['only' => ['index', 'show']])->parameters([
    'catalog' => 'id'
]);

Route::group(['middleware' => 'auth.basic.once'], function () {

    Route::apiresource('v1/catalog', 'API\APICatalogController',
    ['except' => ['index', 'show']])->parameters([
        'catalog' => 'id'
    ]);

    Route::put('v1/catalog/{id}/rent', 'API\APICatalogController@putRent');
    
    Route::put('v1/catalog/{id}/return', 'API\APICatalogController@putReturn');

    // Route::post('v1/catalog/', 'APICatalogController@store');

    // Route::put('v1/catalog/{id}', 'APICatalogController@update');
    
    // Route::delete('v1/catalog/{id}', 'APICatalogController@destroy');
});
