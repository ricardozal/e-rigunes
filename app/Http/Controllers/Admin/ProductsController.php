<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Request\ProductsRequest;
use App\Http\Request\UpdateProductsRequest;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function indexContent(Request $request)
    {
        $products = DB::table('product')
            ->join('provider', 'provider.id', '=', 'product.fk_id_provider')
            ->join('category', 'category.id', '=', 'product.fk_id_category')
            ->select('product.name as product_name', 'product.description as product_desc', 'weight', 'height', 'width', 'length', 'provider.name as provider_name', 'category.name as category_name')
            ->get();

        $query = $products;

        return response()->json([
            'data' => $query
        ]);
    }

    public function create(){
        return view('admin.products.upsert');
    }

    public function createPost(ProductsRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());

        if (!$product->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar el producto'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);

    }

    public function update($productId){
        $product = Product::find($productId);
        return view('admin.products.upsert',['product' => $product]);
    }

    public function updatePost(UpdateProductsRequest $request, $productId)
    {
        $product = Product::find($productId);

        $product->fill($request->all());


        if (!$product->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar el producto'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);
    }
}
