<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseVariants;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('admin.purchase.index');
    }

    public function indexContent(Request $request)
    {
        $query = Purchase::with('provider')
            ->get();

        return response()->json([
            'data' => $query
        ]);

    }

    public function detailPurchase($purchaseId){

        $purchase = Purchase::find($purchaseId);
        //$purchaseVariants = PurchaseVariants::where('fk_id_purchase', '=', $purchaseId)->get();

            return view('admin.purchase.purchaseDetail',[
                'purchase' => $purchase
            ]);

    }

    public function showTableDetails($purchaseId)
    {
        $purchaseVariants = Purchase::find($purchaseId)->purchaseVariants()
            ->with(['product','size'])->get();

        $query = $purchaseVariants;

        return response()->json([
            'data' => $query
        ]);
    }

}
