<?php


namespace App\Http\Controllers\Ecommerce\Account;


use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderResume($orderId){

        /** @var Sale $order */
        $order = Sale::find($orderId);

        return view('ecommerce.account.orders.resume', [
            'order' => $order
        ]);

    }

    public function orderHistory() {

        $buyer = Buyer::whereFkIdUser(Auth::user()->id)->first();

        $orders = $buyer->sales;

        return view('ecommerce.account.orders.my_orders', [
            'orders' => $orders
        ]);
    }

    public function orderDetails($orderId){
        $order = Sale::find($orderId);
        return view('ecommerce.account.orders._details',
            ['order' => $order]
        );
    }

}
