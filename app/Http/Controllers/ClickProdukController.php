<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ClickProdukController extends Controller
{
    public function show($id_produk)
    {
        $product = Product::findOrFail($id_produk);
        $products = Product::all(); // Untuk menampilkan produk lain di bawah produk utama

        return view('clickproduk', compact('product', 'products'));
    }
}
