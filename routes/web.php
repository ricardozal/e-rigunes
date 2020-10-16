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
