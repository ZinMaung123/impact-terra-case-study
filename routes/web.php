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
Route::redirect('/', '/'. app()->getLocale())->middleware('localization');

Route::get('/{locale}', function () {
    return view('welcome');
})->name('welcome')->middleware('localization');


Route::get('/{locale}/admin/home', 'HomeController@index')->name('home')->middleware('localization');

Route::group(['prefix' => '{locale}/admin', 'as' => 'admin.', 'middleware' => 'localization'], function(){

    Auth::routes();

    Route::middleware('auth')->group(function(){
        
        Route::get('/api-tokens', 'UserController@show')->name('users.api-token.show');
        Route::post('/api-tokens', 'UserController@generate')->name('users.api-tokens.generate');
        Route::resource('/markets', 'MarketController');
        Route::resource('/products', 'ProductController');
        Route::get('/users/setting', 'UserController@setting')->name('users.setting');
    });
});
