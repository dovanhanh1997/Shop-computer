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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::prefix('home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/detail/{id}', 'HomeController@detail')->name('home.detail');
    Route::get('/check-out', 'HomeController@checkOut')->name('home.check-out')->middleware('auth');
});

Route::prefix('cart')->group(function () {
    Route::get('/', 'CartController@index')->name('carts.index');
    Route::post('/{id}', 'CartController@changeCart')->name('changeCart');
    Route::get('/{id}', 'CartController@delete')->name('deleteCart');
});
Route::prefix('bills')->group(function () {
    Route::get('/list', 'ShopBillController@index')->name('shopBill.index');
    Route::post('/check-out', 'ShopBillController@storeBill')->name('shopBill.storeBill');
    Route::get('/my-bill', 'ShopBillController@getMyBill')->name('shopBill.getBill');
    Route::get('/detail/{billId}', 'ShopBillController@getBillDetail')->name('shopBill.billDetail');
});

Route::resource('users', 'UserController');
Route::resource('customers', 'CustomerController');
Route::resource('bills', 'BillController');
Route::resource('products', 'ProductController');

