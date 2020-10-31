<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Request\VariantRequest;
use App\Models\Variant;
use App\Models\VariantImage;
use Illuminate\Http\Request;

class VariantsController extends Controller
{

    public function variants($productId)
    {
        $product = Product::find($productId);
        return view('admin.products.indexVariants', ['product' => $product]);
    }

    public function variantsContent($productId)
    {
        $query = Variant::with(['product', 'size'])
            ->where('fk_id_product', '=', $productId)
            ->get();

        return response()->json([
            'data' => $query
        ]);
    }

    public function variantCreate($productId)
    {
        $product = Product::find($productId);

        return view('admin.products.variantUpsert', [
            'product' => $product,
        ]);
    }

    public function variantCreatePost(VariantRequest $request, $productId)
    {
        $variant = new Variant();
        $variant->fk_id_product = $productId;
        $size = $variant->fk_id_size = $request->input('fk_id_size');
        $idColor = $request->input('fk_id_color');

        $variants = Variant::all();

        $variantHasImages = VariantImage::all();
        foreach ($variantHasImages as $variantHI){
            if($variantHI->fk_id_color == $idColor){
                foreach ($variants as $variantSize){
                    if($variantSize->fk_id_size == $size){
                        return response()->json([
                            'errors' => ['fk_id_size' => ['No puedes ingresar una talla que ya esta asociada a este color'] ]
                        ],422);
                    }
                }
            }
        }

        $variant->save();

        $idVariant = $variant->id;

        $variantObj = Variant::findOrFail($idVariant);

        $variantObj->color()->attach($idVariant,['fk_id_color'=>  $idColor]);

        if (!$variantObj->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar la variante'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);
    }

    public function variantActive($variantId)
    {
        $variant = Variant::find($variantId);
        $variant->active = !$variant->active;

        if (!$variant->save()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede modificar el estatus en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
