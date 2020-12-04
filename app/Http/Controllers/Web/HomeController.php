<?php


namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home() {

        $products = Product::whereActive(true)->orderBy('created_at','ASC')->limit(10)->get();
        $product = Product::inRandomOrder()->where('active', true)->limit(10)->get();

        $category = Category::whereActive(true)->get();
        return view('web.home.index',['products'=>$products,
            'category'=>$category,'product'=>$product]);
    }

public function question(){
        return view('web.home.frequent_questions');
}

    public function our(){
        return view('web.home.ours');
    }

    public function termCondition(){
        return view('web.home.terms_conditions');
    }


}
