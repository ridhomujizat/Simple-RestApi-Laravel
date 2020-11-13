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

RoutE::get('/products', 'ProdukController@get');
RoutE::get('/product/{id}', 'ProdukController@getById');

RoutE::post('/product', 'ProdukController@post');

RoutE::put('/product/{id}', 'ProdukController@put');

RoutE::delete('/product/{id}', 'ProdukController@delete');