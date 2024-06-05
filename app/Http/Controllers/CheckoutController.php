<?php

// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show($id_produk)
    {
        $product = Product::find($id_produk);

        if (!$product) {
            return redirect()->route('home')->with('error', 'Produk tidak ditemukan.');
        }

        return view('checkout', ['product' => $product]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_produk' => 'required|exists:products,id',
            'total_harga' => 'required|numeric',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'payment' => 'required|string',
            'shipping' => 'required|string',
        ]);

        // Menyimpan data transaksi ke dalam database
        $transaction = Transaction::create([
            'id_produk' => $request->id_produk,
            'id_user' => Auth::id(),
            'total_harga' => $request->total_harga,
            'tanggal_transaksi' => now(),
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'metode_pembayaran' => $request->payment,
            'kurir' => $request->shipping,
        ]);

        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('checkout.success');
    }
}
