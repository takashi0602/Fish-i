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
    return view('index');
});

Auth::routes();

Route::get('/list', 'FoodController@index');

Route::get('/mypage', 'UserController@index');

Route::get('/cart', 'CartController@index');

Route::post('/cart/add', 'CartController@add');

Route::get('/confirm', 'CartController@confirm');

Route::get('/decision', 'CartController@decision');
