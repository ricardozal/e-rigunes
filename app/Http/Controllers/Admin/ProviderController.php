<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Request\ProviderRequest;
use App\Http\Request\UpdateProviderRequest;


class ProviderController extends Controller
{
    public function index()
    {
        return view('admin.provider.index');
    }

    public function indexContent(Request $request)
    {
        $query = Provider::all();

        return response()->json([
            'data' => $query
        ]);
    }

    public function create(){
        return view('admin.provider.upsert');
    }

    public function createPost(ProviderRequest $request)
    {
        $provider = new Provider();
        $provider->fill($request->all());

        if (!$provider->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar al proveedor'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);

    }

    public function update($providerId){
        $provider = Provider::find($providerId);
        return view('admin.provider.upsert',['provider' => $provider]);
    }

    public function updatePost(UpdateProviderRequest $request, $providerId)
    {
        $provider = Provider::find($providerId);

        $provider->fill($request->all());


        if (!$provider->save()) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar al proveedor'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Guardado correctamente'
        ]);
    }

    public function active($providerId)
    {
        $provider = Provider::find($providerId);
        $provider->active = !$provider->active;
        if (!$provider->save()) {
            return response()->json([
                'success' => false,
                'message' => 'no se puede modificar el estatus en este momento'
            ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function delete($providerId)
    {
        $provider = Provider::find($providerId);

        if (!$provider->delete()) {
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
