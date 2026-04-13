<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');
        $query = Sparepart::query();
        if ($kategori && $kategori !== 'SEMUA') {
            $query->where('kategori', $kategori);
        }
        $spareparts = $query->get();
        $kategoris = [
            'SEMUA', 'ACER', 'ASUS', 'HP', 'LENOVO', 'ADVAN', 'THINKPAD',
            'BATTERY LAPTOP', 'KEYBOARD LAPTOP', 'LCD / LED LAPTOP', 'ADAPTOR LAPTOP',
            'DESKTOP ALL IN ONE', 'MAINBOARD', 'PROSESOR', 'VGA', 'RAM'
        ];
        return view('sparepart.index', compact('spareparts', 'kategoris', 'kategori'));
    }
}
