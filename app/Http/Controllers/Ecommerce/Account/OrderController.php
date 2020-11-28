<?php


namespace App\Http\Controllers\Ecommerce\Account;


use App\Http\Controllers\Controller;
use App\Models\Sale;

class OrderController extends Controller
{
    public function orderResume($orderId){

        /** @var Sale $order */
        $order = Sale::find($orderId);

        return view('ecommerce.account.orders.resume', [
            'order' => $order
        ]);

    }
}
