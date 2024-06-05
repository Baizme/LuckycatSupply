<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add(Request $request)
    {
        $product_id = $request->input('product_id');
        $user_id = Auth::id();

        // Check if the product is already in the wishlist
        $wishlistItem = Wishlist::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if (!$wishlistItem) {
            Wishlist::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke wishlist!');
    }

    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())->with('product')->get();

        return view('wishlist', compact('wishlistItems'));
    }
}
