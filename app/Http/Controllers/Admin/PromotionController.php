<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Request\PromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        return view('admin.promotion.index');
    }

    public function indexContent(Request $request)
    {
        $query = Promotion::all();

        return response()->json([
            'data' => $query
        ]);
    }

    public function active($promotionId)
    {
        $promotion = Promotion::find($promotionId);
        $promotion->active = !$promotion->active;
        if (!$promotion->save()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede modificar el estatus en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function create(){
        return view('admin.promotion.upsert');
    }

    public function createPost(PromotionRequest $request)
    {
        $promotion = new Promotion();
        $promotion->fill($request->all());

        if (!$promotion->save()) {
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

    public function update($promotionId){
        $promotion = Promotion::find($promotionId);
        return view('admin.promotion.upsert',['promotion' => $promotion]);
    }

    public function updatePost(PromotionRequest $request, $promotionId)
    {
        $promotion = Promotion::find($promotionId);

        $promotion->fill($request->all());


        if (!$promotion->save()) {
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
