<?php

use Illuminate\Support\Facades\Route;

Route::get('/',
    'Web\HomeController@home')
    ->name('web_home');

/**
 *      Login
 */

Route::get('/login',
    'Auth\LoginController@login')
    ->name('login');

Route::post('/login',
    'Auth\LoginController@authenticate')
    ->name('login_auth');

Route::get('/create-profile',
    'Web\UserController@create')
    ->name('web_user_create');

Route::post('/create-profile',
    'Web\UserController@createPost')
    ->name('web_user_create_post');

Route::get('/logout',
    'Auth\LoginController@logout')
    ->name('logout');

/**
 *      Login Admin
 */

Route::get('/admin/login',
    'Auth\LoginController@loginAdmin')
    ->name('login_admin');
/**
 *      Home
 */

Route::get(
    '/ours-section',
    'Web\HomeController@our'
)->name('ours_section');


/**
 *      Product Details
 */

Route::get('/product/{productId}/details',
    'Web\ProductController@details')
    ->name('web_product_details');

Route::get('/product/{productId}/color/{colorId}/load-sizes',
    'Web\ProductController@loadSizes')
    ->name('web_load_sizes');

/**
 *      Product Category
 */

Route::get(
    '/category/{categoryId}/product',
    'Web\ProductController@categoryProduct'
)->name('category_products');

/**
 *      Contact
 */
Route::post('/contact',
    'Web\ContactController@contactPost')
    ->name('contact_web');

Route::get(
    '/contact-section',
    'Web\ContactController@contact'
)->name('contact_section');




Route::get(
    '/my-account/index',
    'Web\UserController@personalData'
)->name('account_index');
