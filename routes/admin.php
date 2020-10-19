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

Route::get('/admin/buyers/{buyerId}/active',
    'BuyerController@active')
    ->name('admin_buyer_active');

Route::get('/admin/buyers/{buyerId}/delete',
    'BuyerController@delete')
    ->name('admin_buyer_delete');

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
