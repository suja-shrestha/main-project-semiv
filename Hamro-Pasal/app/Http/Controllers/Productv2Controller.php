<?php

namespace App\Http\Controllers;

use App\Models\Productv2;
use Illuminate\Http\Request;

class Productv2Controller extends Controller
{
    /**
     * Display a listing of all products (Admin dashboard).
     */
    public function index()
    {
        $products = Productv2::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * API endpoint to return JSON of all products.
     */
    public function apiIndex()
    {
        return response()->json(Productv2::all());
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'price'          => 'required|numeric',
            'stock'          => 'required|integer',
            'image_url'      => 'nullable|string|max:255',
            'reviews'        => 'nullable|json',
            'category'       => 'required|string|max:100',

            // Optional validation for the new fields
            'is_new'         => 'nullable|boolean',
            'is_featured'    => 'nullable|boolean',
            'is_hot_sale'    => 'nullable|boolean',
            'is_best_deal'   => 'nullable|boolean',
        ]);

        Productv2::create([
            'name'           => $request->name,
            'description'    => $request->description,
            'price'          => $request->price,
            'stock'          => $request->stock,
            'image_url'      => $request->image_url,
            'reviews'        => $request->reviews,
            'category'       => $request->category,
            'is_new'         => $request->has('is_new'),
            'is_featured'    => $request->has('is_featured'),
            'is_hot_sale'    => $request->has('is_hot_sale'),
            'is_best_deal'   => $request->has('is_best_deal'),
        ]);

        return redirect()->route('productv2.index')->with('success', 'Product added!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $product = Productv2::findOrFail($id);
        $product->delete();

        return redirect()->route('productv2.index')->with('success', 'Product deleted!');
    }
}
