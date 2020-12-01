<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function buyer(){
        /** @var Buyer $buyers */
        $buyers = Buyer::all()
            ->count();

        return response()->json([
            'buyer' => $buyers
        ]);
    }

    public function entry(){
        /** @var Purchase $entryTotal */
        $entryTotal = Purchase::sum('total_price');

        return response()->json([
            'entryTotal' => $entryTotal
        ]);
    }

    public function expenses(){
        $expensesTotal = Sale::sum('total_price');

        return response()->json([
            'expensesTotal' => $expensesTotal
        ]);
    }

    public function chartSales(){
        /** @var Sale $dateSales */

        $dateSales = Sale::all();
        $lastDateSale = $dateSales->last();

        $sales = [];

        foreach ($dateSales as $dateSale){
            $date = $dateSale->created_at;
            $sales[] = [
                'date' =>   $date->toDateString(),
                'total_price' => $dateSale->total_price
            ];
        }

        return response()->json([
            'sales' => $sales
        ]);
    }
}
