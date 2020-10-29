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
 * *******   Variants products *************
 **********************************/

Route::get('/admin/product/{productId}/variants',
    'ProductsController@variants')
    ->name('admin_product_variants');

Route::get('/admin/product/{productId}/variants-content',
    'ProductsController@variantsContent')
    ->name('admin_product_variants_content');

Route::get('/admin/product/{productId}/variant-create',
    'ProductsController@variantCreate')
    ->name('admin_product_variants_create');

Route::post('/admin/product/{productId}/variant-create',
    'ProductsController@variantCreatePost')
    ->name('admin_product_variants_create_post');

Route::get('/admin/product/{variantId}/variant-update',
    'ProductsController@variantUpdate')
    ->name('admin_product_variants_update');

Route::post('/admin/product/{variantId}/variant-update',
    'ProductsController@variantUpdatePost')
    ->name('admin_product_variants_update_post');

/***********************************
 * *******   Category *************
 **********************************/
Route::get('/admin/category',
    'CategoryController@index')
    ->name('admin_category_index');

Route::get('/admin/category-content',
    'CategoryController@indexContent')
    ->name('admin_category_index_content');

Route::get('/admin/category/create',
    'CategoryController@create')
    ->name('admin_category_create');

Route::post('/admin/category/create',
    'CategoryController@createPost')
    ->name('admin_category_create_post');

Route::get('/admin/category/{categoryId}/update',
    'CategoryController@update')
    ->name('admin_category_update');

Route::post('/admin/category/{categoryId}/update',
    'CategoryController@updatePost')
    ->name('admin_category_update_post');

Route::get('/admin/category/{categoryId}/active',
    'CategoryController@active')
    ->name('admin_category_active');

/***********************************
 * *******   Purchase *************
 **********************************/
Route::get('/admin/purchase',
    'PurchaseController@index')
    ->name('admin_purchase_index');

Route::get('/admin/purchase-content',
    'PurchaseController@indexContent')
    ->name('admin_purchase_index_content');

Route::get('/admin/{purchaseId}/purchase-detail',
    'PurchaseController@detailPurchase')
    ->name('admin_purchase_detail');

/***********************************
 * *******   Contact messages *************
 **********************************/

Route::get('/admin/contact-messages',
    'ContactMessagesController@index')
    ->name('admin_contactMessages_index');

Route::get('/admin/contact-messages-content',
    'ContactMessagesController@indexContent')
    ->name('admin_contactMessages_index_content');
