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
    Route::post('/add/{id}','CartController@add')->name('add');
    Route::patch('/quantity/change','CartController@quantityChange');
    Route::delete('/remove/{item}','CartController@removeItem')->name('remove.item');
});

Route::middleware('auth')->prefix('cart')->group(function (){
    Route::post('/register','CartController@register')->name('register');
});
