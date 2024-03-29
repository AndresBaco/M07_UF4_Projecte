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

Route::get('/', 'HomeController@getHome');

Route::get('/login', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function(){

    //movies
    Route::get('/catalog', 'CatalogController@getIndex');
    Route::get('/catalog/show/{id}', 'CatalogController@getShow');

    Route::get('/catalog/create', 'CatalogController@getCreate');
    Route::post('/catalog/create', 'CatalogController@postCreate');
    
    Route::get('/catalog/edit/{id}', 'CatalogController@getEdit');
    Route::put('/catalog/edit/{id}', 'CatalogController@putEdit');
    
    Route::put('/catalog/rent/{id}', 'CatalogController@putRent');
    Route::put('/catalog/return/{id}', 'CatalogController@putReturn');
    Route::delete('/catalog/delete/{id}', 'CatalogController@deleteMovie');

    Route::get('/catalog/export/', 'CatalogController@getExcel');

    //Rating
    Route::post('/rating/vote/{id}', 'RatingController@postCreate');
    Route::delete('/rating/delete/{id}', 'RatingController@ratingDelete');
    //tarifas
    Route::get('/tarifas', 'TarifasController@getIndex');

    Route::get('/tarifas/create', 'TarifasController@getCreate');
    Route::post('/tarifas/create', 'TarifasController@postCreate');

    Route::get('/tarifas/show/{id}', 'TarifasController@getShow');

    Route::get('/tarifas/edit/{id}', 'TarifasController@getEdit');
    Route::put('/tarifas/edit/{id}', 'TarifasController@putEdit');

    Route::delete('/tarifas/delete/{id}', 'TarifasController@deleteTarifa');


});
Auth::routes();

Route::resource('APICatalog', 'APICatalogController');


//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'CatalogController@getIndex')->name('home');
