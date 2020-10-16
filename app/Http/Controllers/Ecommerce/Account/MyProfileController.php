<?php


namespace App\Http\Controllers\Ecommerce\Account;


use App\Http\Controllers\Controller;

class MyProfileController extends Controller
{
    public function index(){

        return view('ecommerce.account.index');

    }
}
