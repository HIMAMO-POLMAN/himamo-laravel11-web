<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;

class MerchandiseController extends Controller
{
    public function index()
    {
        $products = Product::with('variants')
            ->where('is_active', true)
            ->latest()
            ->get();

        return view('katalog.merchandise', compact('products'));
    }
}
