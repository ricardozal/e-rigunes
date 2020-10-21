<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        return view('admin.provider.index');
    }

    public function indexContent(Request $request)
    {

        $query = Provider::all()->get();

        return response()->json([
            'data' => $query
        ]);

    }
}
