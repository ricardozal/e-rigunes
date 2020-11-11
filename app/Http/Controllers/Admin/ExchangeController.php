<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Exchange;
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
}
