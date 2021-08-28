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

Route::prefix('profile')->group(function() {
    Route::get('/', 'ProfileController@index')->name('profile');
    Route::get('/my-orders','ProfileController@myOrders')->name('profile.myOrders');
    Route::get('/orders-return','ProfileController@returnalbes')->name('profile.orderReturn');
    Route::post('/saveProduct/{product}','ProfileController@saveProduct')->name('profile.saveProduct');
    Route::delete('/deleteProduct/{product}','ProfileController@deleteProduct')->name('profile.deleteProduct');
    Route::post('/setReminder/{product}','ProfileController@setReminder')->name('profile.setReminder');
    Route::delete('/unsetReminder/{product}','ProfileController@unsetReminder')->name('profile.unsetReminder');
});
