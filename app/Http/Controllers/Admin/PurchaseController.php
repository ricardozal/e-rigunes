<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Purchase;
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

    public function detailPurchase(Request $request){

    }
}
