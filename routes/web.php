<?php

use Illuminate\Support\Facades\Route;

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

# Shop
Route::prefix('shop')->group(function () {
    Route::get('/', 'ShopController@catalog')->name('shop');
    Route::get('purchase', 'ShopController@purchase');
    Route::get('add-to-cart', 'ShopController@addToCart');
    Route::get('update-cart', 'ShopController@updateCart');
    Route::get('remove-item/{id}', 'ShopController@removeItem');
    Route::get('clear-cart', 'ShopController@clearCart');
    Route::get('checkout', 'ShopController@checkout');
    Route::get('search', 'ShopController@search');
    Route::get('search-results', 'ShopController@searchResults');
    Route::get('{cat_url}', 'ShopController@products');
    Route::get('{cat_url}/{prd_url}', 'ShopController@item');
});

# User
Route::prefix('user')->group(function () {
    Route::get('signin', 'UserController@getSignin');
    Route::post('signin', 'UserController@postSignin');
    Route::get('signup', 'UserController@getSignup');
    Route::post('signup', 'UserController@postSignup');
    Route::get('logout', 'UserController@logout');
});

# Cms
Route::middleware(['cmsadmin'])->group(function () {
    Route::prefix('cms')->group(function () {
        Route::get('dashboard', 'CmsController@dashboard');
        Route::get('orders', 'CmsController@orders');
        Route::resource('menu', 'MenuController');
        Route::resource('contents', 'ContentController');
        Route::resource('categories', 'CategoriesController');
        Route::resource('products', 'ProductsController');
        Route::resource('users', 'UsersController');
    });
});

# Pages
Route::get('/', 'PagesController@home');
Route::get('{url}', 'PagesController@content');