<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Request\ProductsRequest;
use App\Http\Request\UpdateProductsRequest;
use App\Models\Variant;
use App\Models\VariantImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariantHasImagesController extends Controller
{
    public function variantsHasImages($variantId)
    {
        $variant = Variant::find($variantId);

        return view('admin.products.variantsColors', [
            'variant' => $variant,
        ]);
    }

    public function variantsHasImagesContent($variantId)
    {
        $colors = DB::table('variant_has_images')
            ->join('color', 'color.id', '=', 'variant_has_images.fk_id_color')
            ->where('fk_id_variant', '=', $variantId)
            ->select('color.name as color_name')
            ->get();

        $query = $colors;

        return response()->json([
            'data' => $query
        ]);
    }

    public function colorCreate($variantId){
        $variant = Variant::find($variantId);
        return view('admin.products.colorUpsert', [
            'variant' => $variant,
        ]);
    }

    public function colorCreatePost(Request $request, $variantId){

        $variantObj = Variant::findOrFail($variantId);

        $idColor = $request->input('fk_id_color');

        $variantObj->color()->attach($variantId,['fk_id_color'=>  $idColor]);

        if (!$variantObj->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar al usuario'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);
    }

    public function imgUpdate($variantId){
        $variant = Variant::find($variantId);
        return view('admin.products.imgUpsert', [
            'variant' => $variant,
        ]);
    }

    public function imgUpdatePost($variantId){

    }
}
