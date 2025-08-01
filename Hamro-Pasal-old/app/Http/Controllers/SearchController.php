<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// CHANGE 1: Import your Productv2 model instead of Product
use App\Models\Productv2;

class SearchController extends Controller
{
    /**
     * Handle the incoming search request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Validate the request
        $request->validate([
            'query' => 'required|string|min:1',
        ]);

        // Get the search value from the request
        $query = $request->input('query');

        // CHANGE 2: Use Productv2::query() to search on your model
        // Assumes your 'productv2s' table has 'name' and 'description' columns.
        // Change these column names if yours are different.
        $results = Productv2::query()
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(10);

        // Return the search view with the results and the query
        // This part remains the same.
        return view('search_results', compact('results', 'query'));
    }
}