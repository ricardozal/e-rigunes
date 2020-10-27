<?php


namespace App\Http\Controllers\Web;

use App\Models\DataContactWebsite;
use App\Http\Request\ContactRequest;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function contact(){

        return view('web.home.data_contact');
    }



    public function contactPost(ContactRequest $request){
        try {
            \DB::beginTransaction();

            $message = new DataContactWebsite();
            $message->fill($request->all());
            $message->name = $request->name;
            $message->phone = $request->phone;
            $message->email = $request->email;
            $message->message = $request->message;
            $message->saveOrFail();


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
        } catch (\Throwable $e) {
            \DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e
            ]);
        }
    }

}
