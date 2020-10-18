<?php


namespace App\Http\Controllers\Web;


use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Model
{
    public function details($productId)
    {
        $product = Product::find($productId);

        return view('web.product.details',['product' => $product]);
    }
}
