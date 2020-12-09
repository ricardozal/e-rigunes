<?php


namespace App\Services;

use App\Models\Address;
use App\Models\Buyer;
use App\Models\Sale;
use App\Models\Variant;
use Illuminate\Support\Facades\Http;

class Skydropx
{
    public static function getShipment($addressId, $buyerId)
    {
        $order = OrderService::getCurrentOrder();

        /** @var Address $address */
        $address = Address::find($addressId);
        /** @var Buyer $buyer */
        $buyer = Buyer::find($buyerId);

        $orderHasVariants = $order["order_has_variant"] ?? [];

        $parcels = [];

        foreach ($orderHasVariants as $index => $orderHasVariant) {
            /** @var Variant $variant */
            $variant = $orderHasVariant["variant"];
            $quantity = $orderHasVariant["quantity"];

            for($i = 0; $i < $quantity; $i++) {
                $parcels[] = [
                    'weight' => $variant->product->weight,
                    'distance_unit' => 'CM',
                    'mass_unit' => 'KG',
                    'height' => $variant->product->height,
                    'width' => $variant->product->width,
                    'length' => $variant->product->length
                ];
            }
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
                'province' => $address->state,
                'city' => $address->city,
                'name' => $buyer->full_name,
                'zip' => $address->zip_code,
                'country' => 'MX',
                'address1' => $address->street,
                'company' => '-',
                'address2' => '-',
                'phone' => $buyer->phone,
                'email' => $buyer->user->email,
                'references' => $address->references,
                'contents' => 'Calzado'
            ]
        ]);

        $getShipments = $response->json();

        $order["shipping_id"]= $getShipments['data']['id'];

        $options = [];

        foreach ($getShipments['included'] as $shipment){
            if($shipment['type'] == 'rates'){
                $options[] = [
                    'id' => $shipment['id'],
                    'price' => $shipment['attributes']['total_pricing']
                ];
            }
        }

        $temp = array_column($options, 'price');
        array_multisort($temp, SORT_ASC, $options);

        $cheapestOption = $options[0];

        $order["shipping_price"] = $cheapestOption['price'];
        $order["rate_id"] = $cheapestOption['id'];

        OrderService::saveOrder(Sale::computeTotal($order));

        return $order;
    }
}
