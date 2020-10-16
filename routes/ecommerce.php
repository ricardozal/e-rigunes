<?php

use Illuminate\Support\Facades\Route;

Route::get('/my-account',
    'Account\MyProfileController@index')
    ->name('ecommerce_account_profile_index');
