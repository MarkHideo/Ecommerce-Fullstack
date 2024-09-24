<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');

        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $products = product::where('name', 'like', '%' . $query . '%')->get();
        $menus = menu::all(); // Fetch all categories

        return view('search-results', compact('products', 'menus')); // Pass menus to the view
    }
}
