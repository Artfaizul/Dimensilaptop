<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $activeTab = $request->get('tab', 'sperpat');
        $products = [];

        return view('Dimensi katalog', compact('products', 'activeTab'));
    }

    public function all()
    {
        $products = [];

        return view('Dimensi katalog', compact('products'));
    }
    
}