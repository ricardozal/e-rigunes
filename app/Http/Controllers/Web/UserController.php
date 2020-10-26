<?php


namespace App\Http\Controllers\Web;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function personalData(){
        return view('ecommerce.account.personal_data.index');
    }




}
