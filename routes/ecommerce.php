<?php

use Illuminate\Support\Facades\Route;

Route::get('/my-account',
    'Account\MyProfileController@index')
    ->name('ecommerce_account_profile_index');
Route::get(
    '/my-account/update',
    'Account\MyProfileController@updateIndex'
)->name('ecommerce_account_user_update');

Route::post('/my-account/update/post',
    'Account\MyProfileController@updateUserPost')
    ->name('ecommerce_account_user_update_post');

Route::get('/addresses',
    'Account\AddressController@getAddresses')
    ->name('ecommerce_account_address_content');

Route::get('/address/create',
    'Account\AddressController@createAddress')
    ->name('ecommerce_account_address_create');

Route::post('/address/create-post',
    'Account\AddressController@createAddressPost')
    ->name('ecommerce_account_address_create_post');

Route::get('/address/{addressId}/update',
    'Account\AddressController@updateAddress')
    ->name('ecommerce_account_address_update');

Route::post('/address/{addressId}/update-post',
    'Account\AddressController@updateAddressPost')
    ->name('ecommerce_account_address_update_post');

Route::get('/address/{addressId}/active',
    'Account\AddressController@selectAddressActive')
    ->name('ecommerce_account_address_select_active');

/****Shopping Cart*/
Route::post(
    '/shopping-cart/complete-order',
    'ShoppingCartController@completeOrder'
)->name('ecommerce_complete_order');
