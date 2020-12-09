<?php


namespace App\Services;
use App\Models\Sale;
use Illuminate\Support\Facades\Session;

class OrderService
{
    const ORDER = "ORDER";

    /**
     * @return Sale|mixed
     */
    public static function getCurrentOrder()
    {
        $order = Session::get(OrderService::ORDER);
        if ($order === null) {
            $order = new Sale();
            $order["current_step"] = 1;
            $order["order_has_variant"] = [];
            $order["shipping_price"] = 0;
            $order["shipping_id"] = '';
            $order["rate_id"] = '';
            OrderService::saveOrder($order);
        }

        return $order;
    }


    public static function saveOrder($order)
    {
        session([OrderService::ORDER => $order]);
        Session::save();
    }


    public static function deleteOrder()
    {
        Session::forget(OrderService::ORDER);
    }
}

