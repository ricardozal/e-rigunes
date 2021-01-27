<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\ShippingInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Mail;

class SkydropxController extends Controller
{
    public function skydropxGetShipments()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Token token=' . env('SKYDROPX_API_TOKEN')
        ])->get(env('SKYDROPX_URL').'/v1/shipments');

        $getShipments = $response->json();

        return view('admin.sales.Skydropx', ['shipments' => $getShipments]);
    }

    public function createShipment($salesId)
    {
        try {
            \DB::beginTransaction();

            /** @var Sale $sale */
            $sale = Sale::find($salesId);

            $rateId = $sale->shipping_information->rate_id;
            $shipmentId = $sale->shipping_information->skydropx_id;


            /** @var ShippingInformation $shippingInfo */
            $shippingInfo = ShippingInformation::find($sale->shipping_information->id);

            $shippment = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Token token=' . env('SKYDROPX_API_TOKEN')
            ])->get(env('SKYDROPX_URL').'/v1/shipments/'.$shipmentId);

            $label = null;

            foreach ($shippment['included'] as $rate){
                if($rate['type'] == 'rates' && $rate['id'] == $rateId){
                    $label = $rate;
                }
            }

            if ($label != null){
                $shippingInfo->parcel_company = $label['attributes']['provider'];
                $shippingInfo->delivery_date = Carbon::now()->addDays($label['attributes']['days']);
                $shippingInfo->saveOrFail();

                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Token token=' . env('SKYDROPX_API_TOKEN')
                ])
                    ->post(env('SKYDROPX_URL').'/v1/labels', [
                        'rate_id' => (integer)$rateId,
                        'label_format' => 'pdf'
                    ]);

                $resp = $response->json();
                $shippingInfo->guide_number = $resp['data']['attributes']['tracking_number'];
                $shippingInfo->saveOrFail();

            } else{
                return response()->json([
                    'success' => false,
                    'message' => 'No existe el rate ID'
                ],500);
            }

            \DB::commit();

            $email = $sale->fk_id_buyer == null ? $sale->email_guest : $sale->buyer->user->email;
            Mail::send('web.mail.delivery_confirmation',
                [
                    'order' => $sale,
                    'name_buyer' => $sale->fk_id_buyer == null ? $sale->name_guest : $sale->buyer->name,
                    'comments' => $sale->comments
                ],
                function ($msj) use ($email){
                    $msj->subject('Rigunes | Tu orden se ha enviado')
                        ->to($email);
                }
            );

            return response()->json([
                'success' => true,
                'message' => 'Guardado correctamente'
            ]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        } catch (\Throwable $e) {
            \DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
}
