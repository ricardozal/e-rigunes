<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Refund;
use App\Models\SaleVariants;
use App\Models\Variant;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function index()
    {
        return view('admin.refund.index');
    }

    public function indexContent(Request $request)
    {
        /** @var Refund $query */
        $query = Refund::with('address', 'refundStatus', 'shippingInfo', 'buyer')
            ->get();

        return response()->json([
            'data' => $query
        ]);
    }

    public function refundVariant($refundId){

        /** @var Refund $refund */
        $refund = Refund::find($refundId);
        $fk_id_sale_variant = $refund->fk_id_sale_variant;

        /** @var SaleVariants $saleVariant */
        $saleVariant = SaleVariants::find($fk_id_sale_variant);
        $fk_id_variant = $saleVariant->fk_id_variant;

        /** @var Variant $variants */
        $variants = Variant::with('product', 'size', 'color')
            ->where('id', '=', $fk_id_variant)
            ->get();

        return view('admin.refund.refundVariants',['variants' => $variants]);

    }
}
