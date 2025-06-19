<?php

namespace App\Http\Controllers;

use App\Models\Productv2;
use Illuminate\Http\Request;

class Productv2Controller extends Controller
{
    // Dashboard: list all products
    public function index()
    {
        $products = Productv2::all();
        return view('admin.products.index', compact('products'));
    }

    // API: return JSON of all products
    public function apiIndex()
    {
        return response()->json(Productv2::all());
    }

    // Show create form
    public function create()
    {
        return view('admin.products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'image_url'   => 'nullable|string|max:255',
            'reviews'     => 'nullable|json', // ✅ Note: 'json' here, or handle array if using textarea
        ]);

        Productv2::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image_url'   => $request->image_url,
            'reviews'     => $request->reviews,
        ]);

        return redirect()->route('productv2.index')->with('success', 'Product added!');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Productv2::findOrFail($id);
        $product->delete();

        return redirect()->route('productv2.index')->with('success', 'Product deleted!');
    }
}
