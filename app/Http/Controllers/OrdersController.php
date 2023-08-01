<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
Use App\Models\OrderDetail;
Use App\Models\OrderAddress;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function orders_list()
    {
        $result['orders'] = Order::with('orders_detail')->get();
        return view('orders.main',compact('result'));
    }

    public function order_details(Request $request, $id=null)
    {
        $result['order_details'] = OrderDetail::With(['orders','orders_address','products'])->where('order_id',decrypt($id))->get();   
        return view('orders.orders_detail',compact('result'));
    }
}
