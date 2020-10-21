<?php


namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home() {

        $products = Product::whereActive(true)->orderBy('created_at','ASC')->limit(12)->get();
        return view('web.home.index',['products'=>$products]);
    }



}
