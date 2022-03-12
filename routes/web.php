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
Route::get('/find/categories', 'RestaurantController@getCategories') -> name('find.categories.all');
// Route::get('/find/categories', 'RestaurantController@getCategoriesId') -> name('find.categories');


Route::get('/find/restaurant_by_search/{id}', 'RestaurantController@findRestaurant') -> name('find.restaurant');
Route::get('/find/restaurant_by_cat/{id}', 'RestaurantController@findRestaurantByCategoriesId') -> name('find.restaurant.bycat');

// rotta per la visualizzazione del ristorante per il client 
Route::get('/show/restaurant/{id}', 'ClientController@showRestaurant') -> name('show.restaurant');

// rotta checkout
Route::get('/client/checkout', 'ClientController@checkout')
    -> name('checkout');

// API per modificare la visibilità dei piatti
Route::get('/api/dish/toggle/availability/{id}', 'RestaurantController@dishToggleAvailability') 
    -> name('api.dish.availability.toggle');

// ROTTA PAGAMENTO 
Route::get('stripe', 'StripeController@stripe');
Route::post('payment', 'StripeController@payStripe')->name('payment');


Route::post('store/client/info' , 'ClientController@storeClientInfo')
    -> name('store.client.info');

/* ----------------------------------- */

// TEST API CARRELLO
Route::post('/view/cart/', 'DishController@getCart')->name('view.cart');

/* pagina per visualizzazione ordini */

Route::get('/order/statistics/{id}', 'ClientController@orderStats') -> name('order.statistics');

Route::get('/order/statistics/page/{id}', 'ClientController@getOrders') -> name('order.statistics.page');

/* pagina per la visualizzazione dei grafici */

Route::get('/charts/stats', 'RestaurantController@charts') ->name('charts');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
