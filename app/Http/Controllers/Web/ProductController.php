<?php


namespace App\Http\Controllers\Web;


use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Controllers\Web\ProductController
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProductController newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductController newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductController query()
 * @mixin \Eloquent
 */
class ProductController extends Model
{
    public function details($productId)
    {
        $product = Product::find($productId);

        return view('web.product.details',['product' => $product]);
    }

    public function loadSizes($productId, $colorId){

        $variants = Variant::whereFkIdProduct($productId)
            ->where('active',true)
            ->whereHas('variantHasImages', function ($q) use ($colorId){
                $q->where('fk_id_color', $colorId);
            })
            ->with(['size','variantImages'])
            ->get();

        return response()->json([
            'data' => $variants,
        ]);

    }


    public function categoryProduct($categoryId)
    {
        $products = Product::where('active',true)
            ->where('fk_id_category',$categoryId)->get();
        $category = Category::find($categoryId);
        return view('web.product.product_category',['products' => $products,'category'=>$category]);
    }




}
