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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','Shop\MainController@index')->name('homepage');

Route::get('/product/{id}','Shop\MainController@product')->name('voir_produit');

Route::get('/category/{id}','Shop\MainController@viewByCat')->name('voir_produits_par_categorie');

Route::get('/tag/{id}','Shop\MainController@viewByTag')->name('voir_produits_par_tag');

Route::post('/cart/add/{id}','Shop\CartController@add')->name('cart_add');

Route::post('/cart/update', 'Shop\CartController@update')->name('carte_update');

Route::get('/cart','Shop\CartController@cart')->name('cart');

Route::get('/test/{prenom}', 'Shop\MainController@test');

