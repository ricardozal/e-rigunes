<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\ShippingInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

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
        /** @var Sale $sale */
        $sale = Sale::find($salesId);
        $variants = $sale->saleVariants;

        $parcels = [];

        foreach ($variants as $variant) {
            $parcels[] = [
                'weight' => $variant->product->weight,
                'distance_unit' => 'CM',
                'mass_unit' => 'KG',
                'height' => $variant->product->height,
                'width' => $variant->product->width,
                'length' => $variant->product->length
            ];
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Token token=' . env('SKYDROPX_API_TOKEN')
        ])->post(env('SKYDROPX_URL').'/v1/shipments', [
                'address_from' => [
                    'province' => 'Estado de México',
                    'city' => 'San Mateo Atenco',
                    'name' => 'Nestor Jacobo',
                    'zip' => '52104',
                    'country' => 'MX',
                    'address1' => 'Venustiano Carranza, San Miguel',
                    'company' => 'Rigunes',
                    'address2' => 'Avenida independencia',
                    'phone' => '7228593599',
                    'email' => 'contacto@rigunes.com.mx'
                ],
                'parcels' => $parcels,
                'address_to' => [
                    'province' => $sale->address->state,
                    'city' => $sale->address->city,
                    'name' => $sale->buyer->full_name,
                    'zip' => $sale->address->zip_code,
                    'country' => 'MX',
                    'address1' => $sale->address->street,
                    'company' => '-',
                    'address2' => '-',
                    'phone' => $sale->buyer->phone,
                    'email' => $sale->buyer->user->email,
                    'references' => $sale->address->references,
                    'contents' => 'Calzado'
                ]
            ]);

        $getShipments = $response->json();

        $options = [];

        foreach ($getShipments['included'] as $shipment){
            if($shipment['type'] == 'rates'){
                $options[] = $shipment;
            }
        }

        $shipmentInfo = [];
        $amounts = [];

        /** @var ShippingInformation $shipmentInformation */
        $shippingInfo = new ShippingInformation();

        foreach ($options as $option) {
            $amounts []= $option['attributes']['total_pricing'];
                $shipmentInfo[] = [
                    'skydropx_id' => $option['id'],
                    'shipping_price' => $option['attributes']['total_pricing'],
                    'parcel_company' => $option['attributes']['provider'],
                    'delivery_date' => $option['attributes']['days'],
                ];
                //dd($option['attributes']['total_pricing']);
        }

        $amountMin = min($amounts);

        foreach ($shipmentInfo as $item){
            //dd(array_keys($item));
            if($amountMin == $item['shipping_price']){
                $days = $item['delivery_date'];
                $currentDate = date('Y-m-d');

                $shippingInfo->skydropx_id = $item['skydropx_id'];
                $shippingInfo->shipping_price = $item['shipping_price'];
                $shippingInfo->parcel_company = $item['parcel_company'];
                $shippingInfo->delivery_date = date('Y-m-d', strtotime($currentDate.'+'.$days.'days'));


                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Token token=' . env('SKYDROPX_API_TOKEN')
                ])
                    ->post(env('SKYDROPX_URL').'/v1/labels', [
                        'rate_id' => (integer)$item['skydropx_id'],
                        'label_format' => 'pdf'
                    ]);

                $label = $response->json();
                $shippingInfo->guide_number = $label['data']['attributes']['tracking_number'];
                $shippingInfo->save();

                $sale->fk_id_shipping_information = $shippingInfo->id;
                $sale->save();

                if (!$shippingInfo->save()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'No se pudo guardar la categoría'
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Guardado correctamente'
                ]);
            }
        }

    }
}
