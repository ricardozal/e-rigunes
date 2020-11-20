<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Exchange;
use App\Models\SaleVariants;
use App\Models\Variant;
use Illuminate\Http\Request;
use App\Http\Request\StatusExchangeRequest;

class ExchangeController extends Controller
{
    public function index()
    {
        return view('admin.exchange.index');
    }

    public function indexContent(Request $request)
    {
        /** @var Exchange $query */
        $query = Exchange::with('address', 'exchangeStatus', 'shippingInfo', 'buyer')
            ->get();

        return response()->json([
            'data' => $query
        ]);
    }

    public function exchangeSaleVariant($exchangeId){
        /** @var Exchange $exchange */
        $exchange = Exchange::find($exchangeId);
        $fk_id_sale_variant = $exchange->fk_id_sale_variant;

        /** @var SaleVariants $saleVariant */
        $saleVariant = SaleVariants::find($fk_id_sale_variant);
        $fk_id_variant = $saleVariant->fk_id_variant;

        /** @var Variant $variants */
        $variants = Variant::with('product', 'size', 'color')
            ->where('id', '=', $fk_id_variant)
            ->get();

        return view('admin.exchange.exchangeSaleVariants',['variants' => $variants]);
    }

    public function exchangeVariant($exchangeId){

        /** @var Exchange $exchange */
        $exchange = Exchange::find($exchangeId);

        $variants = $exchange->variant;

        return view('admin.exchange.exchangeVariants',['variants' => $variants]);

    }

    public function status($exchangeId)
    {
        /** @var Exchange $exchange */
        $exchange = Exchange::find($exchangeId);
        $status = $exchange->exchangeStatus;

        return view('admin.exchange.modalStatus', [
            'exchange' => $exchange,
            'status' => $status
        ]);
    }

    public function statusPost(StatusExchangeRequest $request, $exchangeId)
    {
        /** @var Exchange $exchange */
        $exchange = Exchange::find($exchangeId);

        $statusExchange = $exchange->fk_id_exchange_status;
        $statusForm = $request->input('fk_id_exchange_status');

        if ($statusExchange == $statusForm) {
            return response()->json([
                'errors' => ['fk_id_exchange_status' => ['El estatus no puede ser el mismo']]
            ], 422);
        }
        if ($statusForm == 2) {
            if ($statusExchange == 3) {
                return response()->json([
                    'errors' => ['fk_id_exchange_status' => ['El estatus previamente fue declinado']]
                ], 422);
            }
            if ($statusExchange == 4) {
                return response()->json([
                    'errors' => ['fk_id_exchange_status' => ['Ha finalizado el proceso']]
                ], 422);
            } else {
                $exchange->fk_id_exchange_status = $statusForm;
            }
        }
        if ($statusForm == 3) {
            if ($statusExchange == 2) {
                return response()->json([
                    'errors' => ['fk_id_exchange_status' => ['El estatus previamente fue aceptado']]
                ], 422);
            }
            if ($statusExchange == 4) {
                return response()->json([
                    'errors' => ['fk_id_exchange_status' => ['Ha finalizado el proceso']]
                ], 422);
            } else {
                $exchange->fk_id_exchange_status = $statusForm;
            }
        }
        if (($statusForm == 1) && ($statusExchange == 4)) {
            return response()->json([
                'errors' => ['fk_id_exchange_status' => ['No se puede volver a activar el status']]
            ], 422);
        }
        if ($statusForm == 4) {
            $exchange->fk_id_exchange_status = $statusForm;
        }

        if (!$exchange->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar el status'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);

    }
}
