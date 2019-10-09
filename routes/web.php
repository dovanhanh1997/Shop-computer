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

Route::middleware('lang')->prefix('home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/detail/{id}', 'HomeController@detail')->name('home.detail');
    Route::post('/search','HomeController@search')->name('home.search');
    Route::get('/check-out', 'HomeController@checkOut')->name('home.check-out')->middleware('auth');

});

Route::get('/user/register_profile','HomeProfileController@registerProfile')->name('home.user.registerProfile');
Route::post('/user/register_profile','HomeProfileController@storeProfile')->name('home.user.storeProfile');

Route::middleware('lang')->prefix('cart')->group(function () {
    Route::get('/', 'CartController@index')->name('carts.index');
    Route::post('/{id}', 'CartController@changeCart')->name('changeCart');
    Route::get('/{id}', 'CartController@delete')->name('deleteCart');
});
Route::middleware('lang')->prefix('bills')->group(function () {
    Route::get('/list', 'ShopBillController@index')->name('shopBill.index');
    Route::post('/check-out', 'ShopBillController@storeBill')->name('shopBill.storeBill');
    Route::get('/my-bill', 'ShopBillController@getMyBill')->name('shopBill.getBill')->middleware('auth');
    Route::get('/detail/{billId}', 'ShopBillController@getBillDetail')->name('shopBill.billDetail');
});

Route::prefix('mail')->group(function (){
    Route::get('/','SendMailController@form')->name('mail.form');
    Route::post('/send','SendMailController@sendMail')->name('mail.send');
});

Route::post('/change-lang','LangController@changeLang')->name('changeLang');



Route::resource('users', 'UserController');
Route::resource('bills', 'BillController');
Route::resource('products', 'ProductController');

