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

Route::get('/', 'AdvertsController@index');

Route::post('login', 'UsersController@login');
Route::post('logout', 'UsersController@logout');

Route::get('/edit', 'AdvertsController@create');
Route::post('/edit', 'AdvertsController@store');

Route::get('/{advert}', 'AdvertsController@show');

Route::get('/edit/{advert}', 'AdvertsController@edit');
Route::patch('/edit/{advert}', 'AdvertsController@update');

Route::delete('/delete/{advert}', 'AdvertsController@destroy');