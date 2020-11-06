<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleVariants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        return view('admin.sales.index');
    }

    public function indexContent(Request $request)
    {
        $query = Sale::with('promotion', 'shipping_information', 'buyer', 'address', 'payment_method')
            ->get();

        return response()->json([
            'data' => $query
        ]);
    }

    public function productsVariants($salesId)
    {
        $saleVariants = DB::table('sale_variants')
            ->join('variant', 'variant.id', '=', 'sale_variants.fk_id_variant')
            ->join('size','size.id', '=', 'variant.fk_id_size')
            ->join('product','product.id', '=', 'variant.fk_id_product')
            ->join('variant_has_images', 'variant_has_images.fk_id_variant', '=', 'variant.id')
            ->join('color','color.id','=', 'variant_has_images.fk_id_color')
            ->where('fk_id_sale','=', $salesId)
            ->select('product.name as product_name', 'color.name as color_name', 'size.value as value_size', 'sale_variants.quantity as sale_quantity', 'sale_variants.sale_price as price_sale')
            ->groupBy('variant.id')
            ->get();

        return view('admin.sales.saleVariants',['saleVariants' => $saleVariants]);
    }

}
