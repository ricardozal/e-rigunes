<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class BuyerController extends Controller
{
    public function index()
    {
        return view('admin.buyer.index');
    }
}
