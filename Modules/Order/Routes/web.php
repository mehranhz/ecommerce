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

Route::prefix('order')->group(function() {
    Route::get('/', 'OrderController@index');
    Route::get('/show/{order}','OrderController@show')->name('order.show');
    Route::patch('/addAddress/{order}','OrderController@addAddress')->name('order.addAddress');
    Route::get('/payment/{order}','OrderController@payment')->name('order.payment');
    Route::post('/register','OrderController@register')->name('order.register');
    Route::post('/return/{order}','OrderController@return')->name('order.return');
});
