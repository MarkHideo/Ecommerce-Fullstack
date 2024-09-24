<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function list_order(){
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.list',[
            'orders' => $orders
        ]);
    }
    public function detail_order(Request $request){
        $order_detail = json_decode($request->order_detail,true);
        $product_id = array_keys($order_detail);
        $products = product::whereIn('id', $product_id)->get();
        return view('admin.order.detail',[
            'products' => $products,
            'order_detail' => $order_detail
        ]);
    }
    public function delete_order(Request $request){
        order::find( $request->order_id )->delete();
        return response()->json([
            'success' => true
        ]) ;
    }
}
