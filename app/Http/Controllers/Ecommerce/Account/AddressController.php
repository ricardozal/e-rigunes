<?php


namespace App\Http\Controllers\Ecommerce\Account;

use App\Http\Controllers\Controller;
use App\Http\Request\AddressRequest;
use App\Models\Address;
use App\Models\Buyer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AddressController extends Controller
{
    public function createAddress(Request $request){

        $fCart = $request->get('cart');

        return view('ecommerce.account.personal_data.upsert_address',[
            'fromCart' => ($fCart != null)
        ]);

    }

    public function getAddresses()
    {

        $user = User::find(Auth::user()->id);

        $addresses = $user->buyer->address;


        return response()->json([
            'addresses' => $addresses
        ]);
    }

    public function createAddressPost(AddressRequest $request){

        try {
            \DB::beginTransaction();

            $buyer = Buyer::find(Auth::user()->buyer->id);
            $address = new Address();
            $address->fill($request->all());
            $address->fk_id_buyer =$buyer->id;
            $address->saveOrFail();




            \DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Guardado correctamente'
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e
            ]);
        }
    }
    public function updateAddress($addressId){

        $address = Address::find($addressId);

        return view('ecommerce.account.personal_data.upsert_address',[
            'address' => $address
        ]);

    }


    public function updateAddressPost(AddressRequest $request, $addressId){

        $address = Address::find($addressId);
        $address->fill($request->all());

        if(!$address->save()){
            return response()->json([
                'success' => false,
                'message' => 'No se pudo actualizar la dirección en este momento, intente más tarde.',
            ]);
        }
        return response()->json([
            'success' => true,
        ]);

    }

    public function selectAddressActive($addressId){

        $user = User::find(Auth::user()->id);

        $addresses = $user->buyer->addresses;

//        foreach ($addresses as $address){
//            $user->addresses($address)->id,['active' => false];
//
//        }
//
//        $user->addresses()->updateExistingPivot($addressId,['active' => true]);



        if (!$user->save()) {
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
