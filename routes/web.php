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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/lang/{lang}', 'LangController@changeLang');

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.admin-home')->middleware('auth:admin');
    Route::get('/login', 'Admin\AdminController@showLoginForm')->name('admin.showLoginForm');
    Route::post('/login', 'Admin\AdminController@login')->name('admin.loginSubmit');
    Route::post('/logout', 'Admin\AdminController@logout')->name('admin.logoutSubmit');
    Route::post('/password/email', 'Admin\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Admin\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.showRequestForm');
    Route::post('/password/reset', 'Admin\AdminResetPasswordController@reset')->name('admin.password.reset');
    Route::get('/password/reset/{token}', 'Admin\AdminResetPasswordController@showResetForm')->name('admin.password.showResetForm');
});


Route::resource('users', 'UserController');
Route::resource('bills', 'BillController');
Route::resource('products', 'ProductController');


Route::prefix('home')->group(function () {
    Route::get('/login/{id?}', 'HomeController@index')->name('home.login');
    Route::get('/detail/{id}', 'HomeController@detail')->name('home.detail');
    Route::post('/search', 'HomeController@search')->name('home.search');
    Route::get('/check-out', 'HomeController@checkOut')->name('home.check-out')->middleware('auth');

});

Route::get('/user/register_profile', 'HomeProfileController@registerProfile')->name('home.user.registerProfile');
Route::post('/user/register_profile', 'HomeProfileController@storeProfile')->name('home.user.storeProfile');

Route::prefix('cart')->group(function () {
    Route::get('/', 'CartController@index')->name('carts.index');
    Route::post('/{id}', 'CartController@changeCart')->name('changeCart');
    Route::get('/{id}', 'CartController@delete')->name('deleteCart');
});
Route::prefix('bill')->group(function () {
    Route::get('/list', 'ShopBillController@index')->name('shopBill.index');
    Route::post('/check-out', 'ShopBillController@storeBill')->name('shopBill.storeBill');
    Route::get('/my-bill', 'ShopBillController@getMyBill')->name('shopBill.getBill')->middleware('auth');
    Route::get('/detail/{billId}', 'ShopBillController@getBillDetail')->name('shopBill.billDetail');
});

Route::prefix('mail')->group(function () {
    Route::get('/', 'SendMailController@form')->name('mail.form');
    Route::post('/send', 'SendMailController@sendMail')->name('mail.send');
});


Route::prefix('login')->group(function () {
    Route::get('/{social}', 'SocialiteController@redirectToProvider');
    Route::get('/{social}/callback', 'SocialiteController@handleProviderCallBack');
});
