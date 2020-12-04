<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Request\ProductsRequest;
use App\Http\Request\UpdateProductsRequest;
use App\Models\Variant;
use App\Models\VariantHasImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function indexContent(Request $request)
    {
        $query = Product::with(['provider','category'])->get();
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

        $priceRigunes = $request->input('rigunes_price');
        $priceStripe = ($priceRigunes * 0.036) + 3;
        $priceSkyDropx = 180;
        $iva = $priceRigunes * 0.16;

        $priceTotal = $priceRigunes + $priceStripe + $priceSkyDropx + $iva;

        $pricePublic = $priceTotal;

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

    public function active($productId)
    {
        $product = Product::find($productId);

        $product->active = !$product->active;
        if (!$product->save()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede modificar el estatus en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function delete($productId)
    {
        $product = Product::find($productId);
        if (!$product->delete()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede modificar el estatus en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
