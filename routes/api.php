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


Route::group(['prefix' => 'v1', 'as' => 'api.v1.', 'namespace' => 'Api\V1'], function(){

    Route::post('/users/register', 'AuthApiController@register')->name('users.register');
    Route::post('/users/login', 'AuthApiController@login')->name('users.login');

    Route::middleware("auth:api")->group(function(){
        Route::apiResource('/markets', 'MarketApiController')->only(['index', 'show']);
        Route::apiResource('/products', 'ProductApiController')->only(['index', 'show']);
        Route::apiResource('/market-prices', 'MarketProductApiController')->only(['index', 'store']);
    });
});