<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\menu;
use Illuminate\Http\Request;

class menuController extends Controller
{
    // Display the add menu form
    public function add_menu() {
        return view('admin.menu.addmenu', [
            'title' => 'Thêm Danh Mục'
        ]);
    }
    // Handle the add menu form submission
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new menu
        $menu = new menu();
        $menu->name = $request->input('name');
        $menu->save();

        return redirect('/admin/menu/listmenu')->with('success', 'Menu added successfully!');
    }  
    // List all menus
    public function list_menu(){
        $menu = menu::all(); // Fetch all menus from the database
        return view('admin.menu.listmenu', [
            'title' => 'Danh Sách Menu',
            'menus' => $menu // Pass menus to the view
        ]);
    }
    public function delete_menu(Request $request){
        menu::find( $request->menu_id )->delete();
        return response()->json([
            'success' => true
        ]) ;
    }  
    public function edit_menu(Request $request){
        $menu = menu::find( $request->id);
        return view('admin.menu.editmenu',[
            'title'=> 'Sửa sản phẩm',
            'menu' => $menu
        ]);
    }
    public function update_menu(Request $request){
        $menu = menu::find( $request->id );
        $menu -> name = $request->input('name');
        $menu -> save();
        return redirect('/admin/menu/listmenu');
    }
}
