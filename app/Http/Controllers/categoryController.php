<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\product;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function show($id) {
        $category = menu::findOrFail($id);
        $products = product::where('category_id', $id)->get();
        return view('category-products', compact('category', 'products'));
    }
}
