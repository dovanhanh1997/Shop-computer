<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products','ProductApiController@index');

Route::get('/product/{id}','ProductApiController@show');

Route::post('/product','ProductApiController@store');

Route::put('/product','ProductApiController@store');

Route::delete('/product/{id}','ProductApiController@destroy');

Route::get('/bills','BillController@indexApi');

Route::get('/bill/{id}','BillController@showApi');

Route::post('/bill','BillController@storeApi');

Route::put('/bill','BillController@storeApi');

Route::delete('/bill/{id}','BillController@destroyApi');
