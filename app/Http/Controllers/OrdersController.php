<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
Use App\Models\OrderDetail;
Use App\Models\OrderAddress;
use Illuminate\Database\Eloquent\Collection;

class OrdersController extends Controller
{
    public function orders_list()
    {
        $result['orders'] = Order::with('orders_detail')->get();
        return view('orders.main',compact('result'));
    }
}
