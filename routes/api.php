<?php

use Illuminate\Http\Request;

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

//Product
Route::get('/product', 'Product\Api\ProductApiController@index');
Route::get('/product/{id}', 'Product\Api\ProductApiController@getObjectById');
Route::post('/product', 'Product\Api\ProductApiController@createProduct');
Route::patch('/product/{id}', 'Product\Api\ProductApiController@updateProduct');
Route::delete('/product/{id}', 'Product\Api\ProductApiController@deleteProduct');

//Customer
Route::get('/customer', 'Customer\Api\CustomerApiController@searchNewClient');

//Sales
Route::get('/sale-document', 'SaleDocument\Api\SaleDocumentApiController@getList');
Route::get('/sale-document/{id}', 'SaleDocument\Api\SaleDocumentApiController@getById');
Route::post('/sale-document', 'SaleDocument\Api\SaleDocumentApiController@createObject');
Route::patch('/sale-document/{id}', 'SaleDocument\Api\SaleDocumentApiController@updateObject');
Route::delete('/sale-document/{id}', 'SaleDocument\Api\SaleDocumentApiController@deleteObject');

//plugins
Route::get('/plugins', 'Plugins\Api\PluginsApiController@install');