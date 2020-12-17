<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function createColor(){
        return view('admin.variant.upsertColor');
    }

    public function createSize(){
        return view('admin.variant.upsertSize');
    }

    public function createColorPost(Request $request){
        /** @var Color $color */

        $colors = Color::all();

        $color = new Color();

        $nameColor = $request->input('name');
        $valueColor = $request->input('value');

        foreach ($colors as $colorName){
            if($nameColor == $colorName->name){
                return response()->json([
                    'errors' => ['name' => ['Este color ya fue registrado']]
                ], 422);
            }
            $color->name = strtolower($nameColor);
        }

        $color->value = $valueColor;

        if (!$color->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar el color'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);
    }

    public function createSizePost(Request $request){

        /** @var Size $size */
        $size = new Size();
        $sizes = Size::all();

        $value = $request->input('value');

        foreach ($sizes as $sizeValue){
            if($value == $sizeValue->value){
                return response()->json([
                    'errors' => ['value' => ['La talla ya esta registrada']]
                ], 422);
            }
        }

        $size->value = $value;

        if (!$size->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar la talla'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);
    }
}
