<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search'); // Get the search query from the form input

        // Validate the search query if necessary
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        // Search for products based on the query
        $products = Product::where('name', 'like', '%' . $query . '%')->get();

        // Return the view with the search results
        return view('search-results', ['products' => $products]);
    }
}
