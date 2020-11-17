<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Sale;
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
            'Authorization' => 'Token token=' . env('API_TOKEN')
        ])
            ->get('https://api-demo.skydropx.com/v1/shipments');

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
            'Authorization' => 'Token token=' . env('API_TOKEN')
        ])
            ->post('https://api-demo.skydropx.com/v1/shipments', [
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

        $attributesParcel = [];
        $total_pricing = [];

        foreach ($options as $option){
            $attributesParcel[] = $option['attributes'];
        }

        foreach ($attributesParcel as $totalPrice){
            $total_pricing[] = $totalPrice['total_pricing'];
        }

        $minPrice = min($total_pricing);
        $id_parcel = "";

        dd($id_parcel);

    }
}
