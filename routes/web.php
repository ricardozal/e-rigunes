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

Route::post('/create-profile-post',
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
    '/about-us',
    'Web\HomeController@our'
)->name('ours_section');

Route::get(
    '/terms-condition',
    'Web\HomeController@termCondition'
)->name('terms_condition_section');

Route::get(
    '/search-products',
    'Web\HomeController@search'
)->name('search_products');

Route::get(
    '/product/search',
    'Web\HomeController@searchProducts'
)->name("web_search_product");

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

/**
 *      Shopping Cart
 */
Route::get('/shopping-cart',
    'Web\OrderController@shoppingCart')
    ->name('web_shopping_cart');

Route::post(
    '/shopping-cart/add-variant',
    'Web\OrderController@addVariant'
)->name('web_add_variant');

Route::get(
    '/shopping-cart/get-order',
    'Web\OrderController@getCurrentOrder'
)->name('web_get_order');

Route::post(
    '/shopping-cart/update-variant',
    'Web\OrderController@updateVariant'
)->name('web_update_variant');

Route::post(
    '/shopping-cart/attach-coupon',
    'Web\OrderController@attachCoupon'
)->name('web_attach_coupon');

Route::get(
    '/shopping-cart/delete-coupon',
    'Web\OrderController@deleteCoupon'
)->name('web_delete_coupon');

Route::post(
    '/shopping-cart/update-current-step',
    'Web\OrderController@updateCurrentStep'
)->name('web_update_current_step');

/****Payment Methods*/

Route::get(
    '/shopping-cart/payment-methods',
    'Web\OrderController@getPaymentMethods'
)->name('web_payment_methods');
