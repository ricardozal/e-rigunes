<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin',
    'HomeController@index')
    ->name('admin_home');
