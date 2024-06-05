<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.data_produk', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_size' => 'required',
            'promo' => 'required',
            'price' => 'required|numeric',
            'product_description' => 'required',
            'product_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_type' => 'required|in:sepatu,aksesoris,baju',
        ]);

        $input = $request->all();

        if ($image = $request->file('product_photo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['product_photo'] = "$destinationPath$profileImage";
        }

        Product::create($input);

        return redirect()->route('admin.data_produk')
                        ->with('success', 'Product created successfully.');
    }

    public function destroy($id_produk)
    {
        $product = Product::findOrFail($id_produk);
        $product->delete();

        return redirect()->route('admin.data_produk')->with('success', 'Product deleted successfully.');
    }

    public function update(Request $request, $id_produk)
    {
        $request->validate([
            'product_name' => 'required',
            'product_size' => 'required',
            'promo' => 'required',
            'price' => 'required|numeric',
            'product_description' => 'required',
            'product_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_type' => 'required|in:sepatu,aksesoris,baju',
        ]);

        $product = Product::find($id_produk);
        $input = $request->all();

        if ($image = $request->file('product_photo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['product_photo'] = "$destinationPath$profileImage";
        } else {
            $input['product_photo'] = $product->product_photo;
        }

        $product->update($input);

        return redirect()->route('admin.data_produk')
                        ->with('success', 'Product updated successfully.');
    }

    public function edit($id_produk)
    {
        $product = Product::find($id_produk);
        return response()->json($product);
    }

    public function dashboard(Request $request)
    {
        $query = $request->input('query');
    
        $products = Product::query();
    
        if ($query) {
            $products->where('product_name', 'LIKE', "%{$query}%");
        }
    
        $productType = $request->input('product_type');
        if ($productType) {
            $products->where('product_type', $productType);
        }
    
        $productTypes = Product::distinct()->pluck('product_type');
    
        $products = $products->get();
    
        // Jika terjadi pemfilteran, kembalikan tampilan produk dengan filter yang diterapkan
        if ($request->has('product_type')) {
            return view('dashboard', compact('products', 'productTypes'));
        }
    
        return view('dashboard', compact('products', 'productTypes'));
    }
    
    public function filterProducts(Request $request)
    {
        $productType = $request->input('product_type', '');

        $products = Product::query();

        if ($productType) {
            $products->where('product_type', $productType);
        }

        $products = $products->get();

        return view('partials.product_list', compact('products'));
    }

    public function show($id_produk)
    {
        $product = Product::findOrFail($id_produk);
        return view('clickproduk', compact('product'));
    }
}
