<?php


namespace App\Http\Controllers\Ecommerce\Account;


use App\Http\Controllers\Controller;
use App\Http\Request\UpdateBuyerRequest;
use App\Http\Request\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Buyer;
use App\Models\User;
use Illuminate\Http\Request;


class MyProfileController extends Controller
{
    public function index(){

            $buyer = Buyer::find(Auth::user()->id);
            return view('ecommerce.account.personal_data.index',['buyer'=>$buyer]);
    }

    public function updateIndex(){
        $buyer = Buyer::find(Auth::user()->id);

        return view('ecommerce.account.personal_data.update',[
            'buyer' => $buyer
        ]);
    }

    public function updateUserPost(UpdateBuyerRequest $request){

        try{
            \DB::beginTransaction();

            $user = User::find(Auth::user()->id);
            $user->email = $request->get('email');

            if($request->input('password') != null)
            {
                $user->password = bcrypt($request->input('password'));
            }

            $user->saveOrFail();

            $buyer = Buyer::whereFkIdUser($user->id)->first();
            $buyer->phone = $request->get('phone');
            $buyer->saveOrFail();

            \DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Proceso completado'
            ]);
        } catch (\Throwable $e) {
            \DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error durante el proceso',
                'error' => $e
            ]);
        }

    }
}
