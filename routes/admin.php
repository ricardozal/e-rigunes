<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin',
    'HomeController@index')
    ->name('admin_home');

/***********************************
 * *******   Buyers *************
 **********************************/

Route::get('/admin/buyers',
    'BuyerController@index')
    ->name('admin_buyer_index');

Route::get('/admin/buyers-content',
    'BuyerController@indexContent')
    ->name('admin_buyer_index_content');

Route::get('/admin/buyers/{buyerId}/update',
    'BuyerController@update')
    ->name('admin_buyer_update');

Route::post('/admin/buyers/{buyerId}/update',
    'BuyerController@updatePost')
    ->name('admin_buyer_update_post');

Route::get('/admin/buyers/{buyerId}/updateAddress',
    'BuyerController@updateAddress')
    ->name('admin_buyer_updateAddress');

Route::get('/admin/buyers/{buyerId}/active',
    'BuyerController@active')
    ->name('admin_buyer_active');

/***********************************
 * *******   User *************
 **********************************/

Route::get('/admin/user',
    'UserController@index')
    ->name('admin_user_index');

Route::get('/admin/user-content',
    'UserController@indexContent')
    ->name('admin_user_index_content');

Route::get('/admin/user/create',
    'UserController@create')
    ->name('admin_user_create');

Route::post('/admin/user/create',
    'UserController@createPost')
    ->name('admin_user_create_post');

Route::get('/admin/user/{userId}/update',
    'UserController@update')
    ->name('admin_user_update');

Route::post('/admin/user/{userId}/update',
    'UserController@updatePost')
    ->name('admin_user_update_post');

Route::get('/admin/user/{userId}/active',
    'UserController@active')
    ->name('admin_user_active');

Route::get('/admin/user/{userId}/delete',
    'UserController@delete')
    ->name('admin_user_delete');

/***********************************
 * *******   Providers *************
 **********************************/
Route::get('/admin/provider',
    'ProviderController@index')
    ->name('admin_provider_index');

Route::get('/admin/provider-content',
    'ProviderController@indexContent')
    ->name('admin_provider_index_content');

Route::get('/admin/provider/create',
    'ProviderController@create')
    ->name('admin_provider_create');

Route::post('/admin/provider/create',
    'ProviderController@createPost')
    ->name('admin_provider_create_post');

Route::get('/admin/provider/{providerId}/update',
    'ProviderController@update')
    ->name('admin_provider_update');

Route::post('/admin/provider/{providerId}/update',
    'ProviderController@updatePost')
    ->name('admin_provider_update_post');

Route::get('/admin/provider/{providerId}/active',
    'ProviderController@active')
    ->name('admin_provider_active');

Route::get('/admin/provider/{providerId}/delete',
    'ProviderController@delete')
    ->name('admin_provider_delete');

/***********************************
 * *******   Products *************
 **********************************/
Route::get('/admin/products',
    'ProductsController@index')
    ->name('admin_products_index');

Route::get('/admin/products-content',
    'ProductsController@indexContent')
    ->name('admin_products_index_content');

Route::get('/admin/product/create',
    'ProductsController@create')
    ->name('admin_product_create');

Route::post('/admin/product/create',
    'ProductsController@createPost')
    ->name('admin_product_create_post');

Route::get('/admin/product/{productId}/update',
    'ProductsController@update')
    ->name('admin_product_update');

Route::post('/admin/product/{productId}/update',
    'ProductsController@updatePost')
    ->name('admin_product_update_post');

Route::get('/admin/product/{productId}/active',
    'ProductsController@active')
    ->name('admin_product_active');

Route::get('/admin/product/{productId}/delete',
    'ProductsController@delete')
    ->name('admin_product_delete');

/***********************************
 * *******   Category *************
 **********************************/
Route::get('/admin/category',
    'CategoryController@index')
    ->name('admin_category_index');

Route::get('/admin/category-content',
    'CategoryController@indexContent')
    ->name('admin_category_index_content');
