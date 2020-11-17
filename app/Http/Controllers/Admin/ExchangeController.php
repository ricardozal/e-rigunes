<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Exchange;
use App\Models\SaleVariants;
use App\Models\Variant;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function index()
    {
        return view('admin.exchange.index');
    }

    public function indexContent(Request $request)
    {
        /** @var Exchange $query */
        $query = Exchange::with('address', 'exchangeStatus', 'shippingInfo', 'buyer')
            ->get();

        return response()->json([
            'data' => $query
        ]);
    }

    public function exchangeSaleVariant($exchangeId){
        /** @var Exchange $exchange */
        $exchange = Exchange::find($exchangeId);
        $fk_id_sale_variant = $exchange->fk_id_sale_variant;

        /** @var SaleVariants $saleVariant */
        $saleVariant = SaleVariants::find($fk_id_sale_variant);
        $fk_id_variant = $saleVariant->fk_id_variant;

        /** @var Variant $variants */
        $variants = Variant::with('product', 'size', 'color')
            ->where('id', '=', $fk_id_variant)
            ->get();

        return view('admin.exchange.exchangeSaleVariants',['variants' => $variants]);
    }

    public function exchangeVariant($exchangeId){

        /** @var Exchange $exchange */
        $exchange = Exchange::find($exchangeId);

        $variants = $exchange->variant;

        return view('admin.exchange.exchangeVariants',['variants' => $variants]);

    }
}
