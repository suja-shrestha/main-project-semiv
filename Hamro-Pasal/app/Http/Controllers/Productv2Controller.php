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
        $products = Productv2::latest()->get();
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
        // Add 'gender' to the validation rules, including the new 'kids' option
        $validatedData = $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'price'          => 'required|numeric|min:0',
            'stock'          => 'required|integer|min:0',
            'image_url'      => 'nullable|string',
            'category'       => 'required|string|max:100',
            'gender'         => 'required|in:men,women,kids,unisex', // <-- UPDATED RULE
            'is_new'         => 'nullable|boolean',
            'is_featured'    => 'nullable|boolean',
            'is_hot_sale'    => 'nullable|boolean',
            'is_best_deal'   => 'nullable|boolean',
        ]);

        // This part correctly handles checkboxes
        $validatedData['is_new'] = $request->has('is_new');
        $validatedData['is_featured'] = $request->has('is_featured');
        $validatedData['is_hot_sale'] = $request->has('is_hot_sale');
        $validatedData['is_best_deal'] = $request->has('is_best_deal');

        // The 'gender' field is already included in $validatedData and will be saved automatically
        Productv2::create($validatedData);

        return redirect()->route('productv2.index')->with('success', 'Product added successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $product = Productv2::findOrFail($id);
        $product->delete();

        return redirect()->route('productv2.index')->with('success', 'Product deleted successfully!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Productv2 $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Productv2 $product)
    {
        // Add 'gender' to the validation rules for the update method as well
        $validatedData = $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'price'          => 'required|numeric|min:0',
            'stock'          => 'required|integer|min:0',
            'image_url'      => 'nullable|string',
            'category'       => 'required|string|max:100',
            'gender'         => 'required|in:men,women,kids,unisex', // <-- UPDATED RULE
            'is_new'         => 'nullable|boolean',
            'is_featured'    => 'nullable|boolean',
            'is_hot_sale'    => 'nullable|boolean',
            'is_best_deal'   => 'nullable|boolean',
        ]);

        $validatedData['is_new'] = $request->has('is_new');
        $validatedData['is_featured'] = $request->has('is_featured');
        $validatedData['is_hot_sale'] = $request->has('is_hot_sale');
        $validatedData['is_best_deal'] = $request->has('is_best_deal');

        $product->update($validatedData);

        return redirect()->route('productv2.index')->with('success', 'Product updated successfully!');
    }
}