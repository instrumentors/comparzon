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


Route::get('/','MainController@showSearch');
Route::get('/searchapi','MainController@getProducts');
Route::get('/products/{product_slug}','MainController@showSearchBySlug');



Route::get('/autocomplete','MainController@showSearchList');


Route::get('/apitest','MainController@scrapetest');


Route::get('/sellers/{asin}/{country_data}','MainController@getSellersFromAmazon');


Route::get("/testamazon","MainController@AmazonMarketPlaceCard");