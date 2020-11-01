<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;


class PaymentMethodController extends Controller
{
    public function index()
    {
        return view('admin.PaymentMethod.index');
    }

    public function indexContent(Request $request)
    {
        $query = PaymentMethod::all();

        return response()->json([
            'data' => $query
        ]);
    }

    public function active($paymentMethodId)
    {
        $paymentMethod = PaymentMethod::find($paymentMethodId);
        $paymentMethod->active = !$paymentMethod->active;
        if (!$paymentMethod->save()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede modificar el estatus en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
