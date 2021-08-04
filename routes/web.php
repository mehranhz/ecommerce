<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/order/registered',function (){
    return view('orderRegistered');
})->name('order.registered');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->namespace('App\\http\\Controllers\\Admin')->group(function (){
    Route::get('panel','HomeController@index')->name('panel');
    Route::get('filemanager','HomeController@fileManager')->name('fileManager');
    Route::post('/address/store','AddressController@store')->name('address.store');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
