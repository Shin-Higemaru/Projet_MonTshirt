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

Route::get('/','Shop\MainController@index')
    ->name('homepage');

Route::get('/product/{id}','Shop\MainController@product')
    ->name('voir_produit');

Route::get('/category/{id}','Shop\MainController@viewByCat')
    ->name('voir_produits_par_categorie');

Route::get('/tag/{id}','Shop\MainController@viewByTag')
    ->name('voir_produits_par_tag');

Route::post('/cart/add/{id}','Shop\CartController@add')
    ->name('cart_add');

Route::post('/cart/update', 'Shop\CartController@update')
    ->name('carte_update');

Route::get('/cart/remove/{id}','Shop\CartController@remove')
    ->name('cart_remove');

Route::get('/cart','Shop\CartController@cart')
    ->name('cart');

Route::get('/test/{prenom}', 'Shop\MainController@test');


Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');


Route::get('/order/auth','Shop\ProcessController@identification')
    ->name('order_auth');

Route::get('/order/adresse','Shop\ProcessController@adresse')
    ->name('order_adresse');

Route::post('/order/adresse','Shop\ProcessController@adresseStore')
    ->name('order_adresse_store');

Route::get('/order/paiement','Shop\ProcessController@paiement')
    ->name('order_paiement');

Route::get('order/confirmation','Shop\ProcessController@confirmationCommande')->name('order_confirmation');

Route::get('order/merci','Shop\ProcessController@merci')
    ->name('order_merci');

Route::get('/backend/login','Backend\MainController@loginBackend')
    ->name('backend_login');

Route::post('/backend/login','Auth\LoginController@authenticateBackend')
    ->name('backend_login_submit');

// Il faut déclarer le middleware dans le fichier Kernel au niveau des routes middleware
Route::middleware(['auth.admin'])->group(function (){
    // ici, toutes les routes concernées par le middleware auth.admin
    Route::get('/backend','Backend\MainController@index')
        ->name('backend_homepage');
});




