<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Refund;
use App\Models\SaleVariants;
use App\Models\Variant;
use Illuminate\Http\Request;
use App\Http\Request\StatusRefundRequest;

class RefundController extends Controller
{
    public function index()
    {
        return view('admin.refund.index');
    }

    public function indexContent(Request $request)
    {
        /** @var Refund $query */
        $query = Refund::with('address', 'refundStatus', 'shippingInfo', 'buyer')
            ->get();

        return response()->json([
            'data' => $query
        ]);
    }

    public function refundVariant($refundId)
    {

        /** @var Refund $refund */
        $refund = Refund::find($refundId);
        $fk_id_sale_variant = $refund->fk_id_sale_variant;

        /** @var SaleVariants $saleVariant */
        $saleVariant = SaleVariants::find($fk_id_sale_variant);
        $fk_id_variant = $saleVariant->fk_id_variant;

        /** @var Variant $variants */
        $variants = Variant::with('product', 'size', 'color')
            ->where('id', '=', $fk_id_variant)
            ->get();

        return view('admin.refund.refundVariants', ['variants' => $variants]);

    }

    public function status($refundId)
    {
        /** @var Refund $refund */
        $refund = Refund::find($refundId);
        $status = $refund->refundStatus;

        return view('admin.refund.modalStatus', [
            'refund' => $refund,
            'status' => $status
        ]);
    }

    public function statusPost(StatusRefundRequest $request, $refundId)
    {
        /** @var Refund $refund */
        $refund = Refund::find($refundId);

        $statusRefund = $refund->fk_id_refund_status;
        $statusForm = $request->input('fk_id_refund_status');

        if ($statusRefund == $statusForm) {
            return response()->json([
                'errors' => ['fk_id_refund_status' => ['El estatus no puede ser el mismo']]
            ], 422);
        }
        if ($statusForm == 2) {
            if ($statusRefund == 3) {
                return response()->json([
                    'errors' => ['fk_id_refund_status' => ['El estatus previamente fue declinado']]
                ], 422);
            }
            if ($statusRefund == 4) {
                return response()->json([
                    'errors' => ['fk_id_refund_status' => ['Ha finalizado el proceso']]
                ], 422);
            } else {
                $refund->fk_id_refund_status = $statusForm;
            }
        }
        if ($statusForm == 3) {
            if ($statusRefund == 2) {
                return response()->json([
                    'errors' => ['fk_id_refund_status' => ['El estatus previamente fue aceptado']]
                ], 422);
            }
            if ($statusRefund == 4) {
                return response()->json([
                    'errors' => ['fk_id_refund_status' => ['Ha finalizado el proceso']]
                ], 422);
            } else {
                $refund->fk_id_refund_status = $statusForm;
            }
        }
        if (($statusForm == 1) && ($statusRefund == 4)) {
            return response()->json([
                'errors' => ['fk_id_refund_status' => ['No se puede volver a activar el status']]
            ], 422);
        }
        if ($statusForm == 4) {
            $refund->fk_id_refund_status = $statusForm;
        }

        if (!$refund->save()) {
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
