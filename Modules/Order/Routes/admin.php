<?php
Route::get('/orders','OrderController@index')->name('orders.index');
Route::get('/orders/returns','OrderController@returns')->name('orders.returns');
Route::get('/order/{order}','OrderController@show')->name('orders.show');
Route::patch('/order/{order}','OrderController@update')->name('orders.update');
Route::patch('/order/changeReturnStatus/{return}','OrderController@updateReturnStatus')->name('orders.changeReturnStatus');
