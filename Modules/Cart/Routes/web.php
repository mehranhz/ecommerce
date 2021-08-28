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

Route::prefix('cart')->group(function() {
    Route::get('/', 'CartController@index')->name('index');
    Route::get('/serialized', 'CartController@serialized')->name('serialized');
    Route::post('/add/{id}','CartController@add')->name('add');
    Route::post('/addItem/{id}','CartController@addItem')->name('addItem');
    Route::patch('/quantity/change','CartController@quantityChange');
    Route::delete('/remove/{item}','CartController@remove')->name('remove.item');
    Route::delete('/removeItem/ajax/{item}','CartController@removeItem')->name('removeItem');

    Route::patch('/reduce/{id}','CartController@reduce');

});

