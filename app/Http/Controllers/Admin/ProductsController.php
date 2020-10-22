<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;



class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function indexContent(Request $request)
    {
        $query = Product::with('category', 'provider')
            ->get();

        return response()->json([
            'data' => $query
        ]);
    }
}
