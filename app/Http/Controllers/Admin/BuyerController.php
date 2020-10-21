<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Http\Request\UpdateBuyerRequest;

class BuyerController extends Controller
{
    public function index()
    {
        return view('admin.buyer.index');
    }

    public function indexContent(Request $request)
    {

        $query = Buyer::all();

        return response()->json([
            'data' => $query
        ]);

    }

    public function update($buyerId){
        $buyer = Buyer::find($buyerId);
        return view('admin.buyer.upsert',['buyer' => $buyer]);
    }


    public function updatePost(UpdateBuyerRequest $request, $buyerId)
    {
        $buyer = Buyer::find($buyerId);

        $buyer->fill($request->all());

        if($request->input('password') != null)
        {
            $buyer->password = bcrypt($request->input('password'));
        }

        if (!$buyer->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar al comprador'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);
    }

    public function updateAddress($buyerId){

        $address = Address::all()
            ->where('fk_id_buyer', $buyerId);

        return view('admin.buyer.upsertAddress',['address' => $address]);
    }


    public function active($buyerId)
    {
        $buyer = Buyer::find($buyerId);
        $buyer->active = !$buyer->active;
        if (!$buyer->save()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede modificar el estatus en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function delete($buyerId)
    {
        $buyer = Buyer::find($buyerId);

        if (!$buyer->delete()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede Elimar el registro en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
