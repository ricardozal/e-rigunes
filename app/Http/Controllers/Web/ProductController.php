<?php


namespace App\Http\Controllers\Web;


use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $products = Product::whereActive(true)->whereHas('variants')->orderBy('created_at','DESC')->limit(16)->get();
        return view('web.product.details',['product' => $product,'products'=>$products]);
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
        $category = Category::find($categoryId);
        $categorys = Category::whereActive(true)->get();
        $products = Product::whereActive(true)
            ->where('fk_id_category',$categoryId)
            ->paginate(8);
        $productcat = Product::inRandomOrder()->whereHas('variants')->where('active', true)->limit(9)->get();


        return view('web.product.product_category',[
            'products' => $products,
            'category'=>$category,
            'productcat'=>$productcat,
            'categorys'=>$categorys]);

    }




}
