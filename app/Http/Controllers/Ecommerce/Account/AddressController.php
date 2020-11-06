<?php


namespace App\Http\Controllers\Ecommerce\Account;

use App\Http\Controllers\Controller;
use App\Http\Request\AddressRequest;
use App\Models\Address;
use App\Models\Buyer;
use Illuminate\Support\Facades\Auth;


class AddressController extends Controller
{
    public function createAddress(){

        return view('ecommerce.account.personal_data.upsert_address');

    }

    public function getAddresses()
    {

        $user = Buyer::find(Auth::user()->id);

        $addresses = $user->addresses;

        return response()->json([
            'addresses' => $addresses
        ]);
    }

    public function createAddressPost(AddressRequest $request){

        try {
            \DB::beginTransaction();

            $user =Buyer::find(Auth::user()->id);
            $address = new Address();
            $address->fill($request->all());
            $address->saveOrFail();



            $user->saveOrFail();

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

        return view('web.sections.account.datauser.upsert_address',[
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

        $user = Buyer::find(Auth::user()->id);

        $addresses = $user->addresses;

        foreach ($addresses as $address){
            $user->addresses()->updateExistingPivot($address->id,['active' => false]);

        }

        $user->addresses()->updateExistingPivot($addressId,['active' => true]);



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
