<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseStatus;
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
        /** @var Purchase $purchase */

        $query = Purchase::with('provider', 'status')
            ->get();

        return response()->json([
            'data' => $query
        ]);

    }

    public function deliverPurchase($purchaseId){

        /** @var Purchase $purchase */
        $purchase = Purchase::find($purchaseId);
        $purchase->fk_id_purchase_status = PurchaseStatus::DELIVERED;

        if(!$purchase->save()){
            return response()->json([
                'success' => false,
                'error' => 'Error al cambiar de estado'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Proceso completado'
        ]);
    }

    public function detailPurchase($purchaseId){

        /** @var Purchase $purchaseVariants */
        $purchaseVariants = Purchase::find($purchaseId)->purchaseVariants()
            ->with(['product','size','color'])->get();

            return view('admin.purchase.purchaseDetail',[
                'purchaseVariants' => $purchaseVariants
            ]);

    }

}
