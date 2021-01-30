<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Request\MessageRequest;
use App\Models\DataContactWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactMessagesController extends Controller
{
    public function index()
    {
        return view('admin.contactMessages.index');
    }

    public function indexContent(Request $request)
    {
        $query = DataContactWebsite::all();

        return response()->json([
            'data' => $query
        ]);
    }

    public function show($messageId)
    {
        /** @var DataContactWebsite $message */
        $message = DataContactWebsite::find($messageId);

        return view('admin.contactMessages.show',[
            'message' => $message
        ]);
    }

    public function answerPost(MessageRequest $request, $messageId)
    {
        $answer = $request->input('answer');

        /** @var DataContactWebsite $message */
        $message = DataContactWebsite::find($messageId);
        $email = $message->email;

        Mail::send('web.mail.answer_message',
            [
                'name_buyer' => $message->name,
                'question' => $message->message,
                'answer' => $answer
            ],
            function ($msj) use ($email){
                $msj->subject('Rigunes | Respuesta a mensaje enviado')
                    ->to($email);
            }
        );

        return response()->json([
            'success' => true,
            'message' => 'La mensaje contestado con éxito'
        ]);
    }
}
