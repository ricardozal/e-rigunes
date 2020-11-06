<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Http\Request\VariantRequest;
use App\Models\Variant;
use App\Models\VariantHasImages;
use App\Services\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class VariantController extends Controller
{

    public function index($productId)
    {
        $product = Product::find($productId);
        return view('admin.variant.index', ['product' => $product]);
    }

    public function indexContent($productId)
    {
        $query = Variant::with(['product', 'size'])
            ->where('fk_id_product', $productId)
            ->get();

        return response()->json([
            'data' => $query
        ]);
    }

    public function create($productId)
    {
        $product = Product::find($productId);

        return view('admin.variant.upsert', [
            'product' => $product,
        ]);
    }

    public function createPost(Request $request)
    {

        $productId = $request->input('productId');

        try {
            DB::beginTransaction();

            /** @var Product $product */
            $product = Product::find($productId);

            foreach ($product->variants as $variant){
                if($variant->color_name->id == $request->input('color') && $variant->size->id == $request->input('size')){
                    return response()->json([
                        'errors' => ['images' => ['La talla y color seleccionado ya está resgitrado en el modelo '.$product->name] ]
                    ],422);
                }
            }

            $variant = new Variant();
            $variant->fk_id_size = $request->input('size');
            $variant->fk_id_product = $product->id;
            $variant->saveOrFail();

            if($request->input('image-selected') != null){
                foreach ($request->input('image-selected') as $imageId)
                {
                    $variantHasImage = new VariantHasImages();
                    $variantHasImage->fk_id_color = $request->input('color');
                    $variantHasImage->fk_id_variant = $variant->id;
                    $variantHasImage->fk_id_image = $imageId;
                    $variantHasImage->saveOrFail();
                }
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Guardado correctamente',
                'variant_id' => $variant->id
            ]);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function saveImage(Request $request){
        /** @var Variant $variant */
        $variant = Variant::find($request->input('variantId'));

        /** @var Color $color */
        $color = Color::find($request->input('color'));

        $fileOk = $request->hasFile('file') &&
            $request->file('file')->isValid();

        if (!$fileOk){
            return response()->json([
                'errors' => ['images' => ['Alguna imagen es invalida'] ]
            ],422);
        }

        try {
            DB::beginTransaction();

            $url = UploadFiles::storeFile($request->file('file'),$variant->id,'shoes');

            $image = new Image();
            $image->url = $url;
            $image->featured = true;
            $image->saveOrFail();

            $variantHasImage = new VariantHasImages();
            $variantHasImage->fk_id_color = $color->id;
            $variantHasImage->fk_id_variant = $variant->id;
            $variantHasImage->fk_id_image = $image->id;
            $variantHasImage->saveOrFail();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Guardado correctamente'
            ]);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update($variantId){

        /** @var Variant $variant */
        $variant = Variant::find($variantId);

        /** @var Color $color */
        $color = Color::find($variant->color_name->id);

        $variants = $variant->product->variants->pluck('id')->toArray();

        $variantImages = Image::whereHas('variantHasImages',function ($q) use ($variants, $color) {
            $q->whereIn('fk_id_variant',$variants);
            $q->where('fk_id_color', $color->id);
        })->get();

        return view('admin.variant.upsert', [
            'variant' => $variant,
            'variantImages' => $variantImages
        ]);
    }

    public function updatePost(Request $request){

        /** @var Variant $variant */
        $variant = Variant::find($request->input('variantId'));

        /** @var Color $color */
        $color = $variant->color_name;

        $first = $request->input('first');

        if($request->file('file') == null && $request->input('image-selected') == null){
            return response()->json([
                'errors' => ['images' => ['No se seleccionaron imagenes'] ]
            ],422);
        }

        try {
            DB::beginTransaction();

            if($first != null){

                VariantHasImages::whereFkIdVariant($variant->id)->delete();

                if($request->input('image-selected') != null){

                    foreach ($request->input('image-selected') as $imageId)
                    {
                        $variantHasImage = new VariantHasImages();
                        $variantHasImage->fk_id_color = $color->id;
                        $variantHasImage->fk_id_variant = $variant->id;
                        $variantHasImage->fk_id_image = $imageId;
                        $variantHasImage->saveOrFail();
                    }
                }

                if($request->file('file') != null){

                    $fileOk = $request->hasFile('file') &&
                        $request->file('file')->isValid();

                    if (!$fileOk){
                        return response()->json([
                            'errors' => ['images' => ['Alguna imagen es invalida'] ]
                        ],422);
                    }

                    $url = UploadFiles::storeFile($request->file('file'),$variant->id,'shoes');

                    $image = new Image();
                    $image->url = $url;
                    $image->featured = true;
                    $image->saveOrFail();

                    $variantHasImage = new VariantHasImages();
                    $variantHasImage->fk_id_color = $color->id;
                    $variantHasImage->fk_id_variant = $variant->id;
                    $variantHasImage->fk_id_image = $image->id;
                    $variantHasImage->saveOrFail();
                }
            } else {

                $fileOk = $request->hasFile('file') &&
                    $request->file('file')->isValid();

                if (!$fileOk){
                    return response()->json([
                        'errors' => ['images' => ['Alguna imagen es invalida'] ]
                    ],422);
                }

                /** @var Variant $variant */
                $url = UploadFiles::storeFile($request->file('file'),$variant->id,'shoes');

                $image = new Image();
                $image->url = $url;
                $image->featured = true;
                $image->saveOrFail();

                $variantHasImage = new VariantHasImages();
                $variantHasImage->fk_id_color = $color->id;
                $variantHasImage->fk_id_variant = $variant->id;
                $variantHasImage->fk_id_image = $image->id;
                $variantHasImage->saveOrFail();
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Guardado correctamente'
            ]);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function active($variantId)
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

    public function loadImages(Request $request, $productId){

        /** @var Product $product */
        $product = Product::find($productId);

        /** @var Color $color */
        $color = Color::find($request->input('colorId'));

        $variants = $product->variants->pluck('id')->toArray();

        $images = Image::whereHas('variantHasImages',function ($q) use ($variants, $color) {
            $q->whereIn('fk_id_variant',$variants);
            $q->where('fk_id_color', $color->id);
        })->get();

        return response()->json([
            'data' => $images,
        ]);

    }
}
