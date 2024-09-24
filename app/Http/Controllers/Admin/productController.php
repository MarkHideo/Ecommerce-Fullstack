<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Menu; // Add this to import the Menu model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class productController extends Controller
{
    // Show form to add a new product
    public function add_product(){
        // Fetch all categories
        $categories = Menu::all();
        return view('admin.product.add', [
            'title' => 'Thêm Sản Phẩm',
            'categories' => $categories  // Pass categories to the view
        ]);
    }

    // Insert a new product into the database
    public function insert_product(Request $request){
        $product = new product();
        $product->name = $request->input('name');
        $product->material = $request->input('material');
        $product->price_normal = $request->input('price_normal');
        $product->price_sale = $request->input('price_sale');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->image = $request->input('image');
        $product_images = implode('*', $request->input('images'));
        $product->images = $product_images;

        // Assign selected category ID
        $product->category_id = $request->input('category_id');  // Saving the selected category

        $product->save();

        return redirect()->back();
    }

    // List products
    public function list_product(Request $request){
        $product = DB::table('products')->paginate(10);
        return view('admin.product.list', [
            'title' => 'Danh sách Sản phẩm',
            'products' => $product
        ]);
    }

    // Delete a product
    public function delete_product(Request $request){
        product::find($request->product_id)->delete();
        return response()->json([
            'success' => true
        ]);
    }

    // Show form to edit a product
    public function edit_product(Request $request){
        $product = product::find($request->id);
        $categories = menu::all();  // Fetch all categories to show in the edit form

        return view('admin.product.edit', [
            'title' => 'Sửa sản phẩm',
            'product' => $product,
            'categories' => $categories  // Pass categories to the view
        ]);
    }

    // Update product information
    public function update_product(Request $request){
        $product = product::find($request->id);
        $product->name = $request->input('name');
        $product->material = $request->input('material');
        $product->price_normal = $request->input('price_normal');
        $product->price_sale = $request->input('price_sale');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->image = $request->input('image');
        $product_images = implode('*', $request->input('images'));
        $product->images = $product_images;

        // Update category ID
        $product->category_id = $request->input('category_id');  // Updating the selected category

        $product->save();

        return redirect('/admin/product/list');
    }
}
