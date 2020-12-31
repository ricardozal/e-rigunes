<?php


namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function home() {

        $products = Product::whereActive(true)->whereHas('variants')->orderBy('created_at','DESC')->limit(3)->get();
        $product = Product::inRandomOrder()->whereHas('variants')->where('active', true)->limit(6)->get();
        $category = Category::whereActive(true)->get();
        return view('web.home.index',['products'=>$products,
            'category'=>$category,'product'=>$product]);
    }

    public function question(){
         return view('web.home.questions');
    }

    public function our(){
        return view('web.home.ours');
    }

    public function termCondition(){
        return view('web.home.terms_conditions');
    }

    public function search(Request $request) {

        $productName = $request->get('productName', '');
        $products = Product::whereActive(true);

        if ($productName != '') {
            $products->where('name', 'like', '%' . $productName . '%');
        }

        if (request()->ajax()) {
            return response()->json(view('web.home._search_results',[
                'products' => $products->paginate(9)
            ])->render());
        }

        return view('web.home.search', [
            'products' => $products->paginate(9)
        ]);
    }

    public function searchProducts(Request $request) {

        $query = $request->input('query', '');
        $response = [
            'suggestions' => [],
            'query' => $query
        ];

        $products = Product::whereActive(true)
            ->where('name', 'like', '%' . $query . '%')
            ->limit(5)
            ->get();

        foreach ($products as $product) {

            $response['suggestions'][] = [
                'id' => $product->id,
                'value' => $product->name,
            ];
        }

        return response()->json($response);
    }
}
