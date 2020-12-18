<?php


namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Request\CreateUserRequest;
use App\Models\Buyer;
use App\Models\User;
use App\Models\Role;


class UserController extends Controller
{


    public function create()
    {
        return view('web.auth.create');
    }



    public function createPost(CreateUserRequest $request)
    {

        try{
            \DB::beginTransaction();

            $user = new User();
            $user->email = $request->get('email');
            $user->password = bcrypt($request->input('password'));
            $user->fk_id_role = Role::BUYER;
            $user->saveOrFail();

            $buyer = new Buyer();
            $buyer->name =$request->get('name');
            $buyer->father_last_name= $request->get('father_last_name');
            $buyer->mother_last_name= $request->get('mother_last_name');
            $buyer->birthday= $request->get('birthday');
            $buyer->phone = $request->get('phone');
            $buyer->fk_id_user = $user->id;
            $buyer->saveOrFail();

            \DB::commit();

            $dataLogin = [
                'email' => $user->email,
                'password' => $request->input('password'),
                'active' => 1
            ];

            $remember = false;
            if (\Auth::attempt($dataLogin, $remember)) {
                return redirect(route('web_home'));
            }

        } catch (\Throwable $e) {
            \DB::rollBack();
            return redirect()->route('web_user_create')->withErrors([
                'error-general' => 'Algo salió mal, inténtalo más tarde.'
            ])->withInput($request->all());
        }
    }


}
