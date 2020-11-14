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

RoutE::get('/products', array('middleware' => 'cors', 'uses' =>'ProdukController@get'));

RoutE::get('/product/{id}', array('middleware' => 'cors', 'uses' => 'ProdukController@getById'));

RoutE::post('/product', array('middleware' => 'cors', 'uses' =>'ProdukController@post'));

RoutE::put('/product/{id}', array('middleware' => 'cors', 'uses' =>'ProdukController@put'));

RoutE::delete('/product/{id}', array('middleware' => 'cors', 'uses' =>'ProdukController@delete'));