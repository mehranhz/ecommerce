<?php

Route::resource('products','ProductController');
Route::post('products/addVariety','ProductController@addVariety')->name('products.addVariety');
