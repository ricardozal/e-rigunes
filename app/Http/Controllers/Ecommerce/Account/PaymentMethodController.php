<?php


namespace App\Http\Controllers\Ecommerce\Account;


use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\CreditCard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Exception\ApiErrorException;
use Stripe\SetupIntent;
use Stripe\Stripe;

class PaymentMethodController extends Controller
{
    public function getCards(){

        /** @var User $user */
        $user = User::find(Auth::user()->id);

        $creditCards = $user->buyer->creditCards;

        return response()->json([
            'credit_cards' => $creditCards
        ]);

    }

    public function createCard(Request $request){

        $fCart = $request->get('cart');

        return view('ecommerce.account.payment_methods.create', ['fromCart' => ($fCart != null)]);
    }

    public function createPost(Request $request){

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $buyer = Buyer::whereFkIdUser(Auth::user()->id)->first();
        $creditCard = new CreditCard();
        $paymentMethod = null;
        try{
            $paymentMethod = \Stripe\PaymentMethod::retrieve(
                $request->get('payment_method')
            );
        }catch (ApiErrorException $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ],500);
        }

        $creditCard->payment_method_key = $request->get('payment_method');
        $creditCard->cardholder = $request->get('holder_name');
        $creditCard->card_number =  '**** **** **** ' . $paymentMethod->card["last4"];
        $creditCard->expiration_month =  ($paymentMethod->card["exp_month"] * 1) < 10 ? '0'.$paymentMethod->card["exp_month"] : $paymentMethod->card["exp_month"]  ;
        $creditCard->expiration_year = $paymentMethod->card["exp_year"];
        $creditCard->fk_id_buyer = $buyer->id;

        if (!$creditCard->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar la tarjeta'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);

    }

    public function getStripeSetupIntent()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $buyer = Buyer::whereFkIdUser(Auth::user()->id)->first();

        try{
            if($buyer->customer_stripe_id == null){
                $customer = \Stripe\Customer::create();
                $buyer->customer_stripe_id = $customer->id;
                if(!$buyer->save()){
                    return response()->json([
                        'success' => false,
                        'message' => 'Algo salió mal',
                    ]);
                }
            }
            $intent = SetupIntent::create([
                'customer' => $buyer->customer_stripe_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Correcto',
                'data' => $intent->client_secret
            ], 200);

        } catch (ApiErrorException $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null
            ]);

        }
    }

}
