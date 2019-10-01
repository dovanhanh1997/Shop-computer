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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('home')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/detail/{id}', 'HomeController@detail')->name('detail');
    Route::post('/detail/{id}','CartController@addToCart')->name('addToCart');

});
Route::resource('users','UserController');
Route::resource('customers','CustomerController');
Route::resource('bills','BillController');
Route::resource('products','ProductController');

