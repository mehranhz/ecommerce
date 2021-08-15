<?php
Route::get('/orders','OrderController@index')->name('orders.index');
Route::get('/order/{order}','OrderController@show')->name('orders.show');
Route::patch('/order/{order}','OrderController@update')->name('orders.update');
