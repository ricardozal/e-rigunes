<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Refund;
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
        $query = Refund::with('address', 'refundStatus', 'shippingInfo', 'buyer', 'saleVariants')
            ->get();

        return response()->json([
            'data' => $query
        ]);
    }
}
