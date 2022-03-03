<?php

use Illuminate\Support\Facades\Route;

/* rotte di autenticazione (register, login, logout)*/ /* Giuseppe e Gabriele */

Route::get('/', 'GuestController@home') -> name('home');

Route::get('/register/form', 'RestaurantController@registerForm') -> name('register.form');

Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::post('/login', 'Auth\LoginController@login') -> name('login');

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

/* rotta di pagina singola per ogni ristorante dopo l'accesso(pagina specifica dello user dopo accesso) */ /* Giuseppe e Gabriele */

Route::get('/restaurant', 'RestaurantController@showRestaurant') -> name('restaurant');
Route::get('/restaurant/info/{id}', 'RestaurantController@getRestaurantInfo') -> name('restaurant.info');

/* rotta con i piatti, e relativo tasto per nasconderlo agli utenti */ /* Mario */

Route::get('/dishes/list/{id}', 'DishController@getRestaurantDishes') -> name('dishes.list'); /* --DONE-- */ 
Route::get('/dishes/hide/{id}', 'DishController@hide') -> name('dish.hide'); /* --DONE-- */

/* form di inserimento piatti */ /* Andreea */

Route::get('/dish/create/{id}', 'DishController@create') -> name('dish.create');
Route::post('/dish/store/{id}', 'DishController@store') -> name('dish.store');

/* rotta con i form di modifica */ /* Pier */

Route::get('/dish/edit/{id}', 'DishController@edit') -> name('dish.edit');
Route::post('/dish/update/{id}', 'DishController@update') -> name('dish.update');

/* rotta per la ricerca dei ristoranti */

Route::get('/find/restaurant', 'RestaurantController@findRestaurant') -> name('find.restaurant');

/* rotta per filtro delle categorie */

Route::get('/find/categories/{id}', 'RestaurantController@getCategoriesId') -> name('find.categories');

/* rotta per la visualizzazione del menu del singolo ristprante */

/* Route::get('/dishes/list/forUser/{id}', 'DishController@getSingleMenu') -> name('single.menu'); */

Route::get('/show/restaurant/{id}', 'ClientController@showRestaurant') -> name('show.restaurant');


/* ----------------------------------- */

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
