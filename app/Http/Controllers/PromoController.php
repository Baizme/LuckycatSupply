<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PromoController extends Controller
{
    public function index()
    {
        // Mengambil produk yang memiliki promo
        $promoProducts = Product::promo()->get();
        return view('promo', compact('promoProducts'));
    }
}

