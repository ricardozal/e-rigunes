<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\DataContactWebsite;
use Illuminate\Http\Request;


class ContactMessagesController extends Controller
{
    public function index()
    {
        return view('admin.contactMessages.index');
    }

    public function indexContent(Request $request)
    {
        $query = DataContactWebsite::all();

        return response()->json([
            'data' => $query
        ]);
    }
}
