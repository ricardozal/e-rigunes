<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        return view('admin.variant.index');
    }

    public function indexContent(Request $request)
    {

        $query = Variant::with(['product','size','color'])
            ->get();

        return response()->json([
            'data' => $query
        ]);

    }
}
