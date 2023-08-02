<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
Use App\Models\OrderDetail;
Use App\Models\OrderAddress;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use Auth;

class VendorOrdersController extends Controller
{
    public function orders_list()
    {
        $result['orders'] = Order::with('orders_detail')->where('users_id',Auth::user()->id)->paginate(2);
        return view('vendor_orders.main',compact('result'));
    }

    public function order_details(Request $request, $id=null)
    {
        $result['order_details'] = Order::With(['orders_detail','orders_address'])->where('id',decrypt($id))->get();   
        return view('vendor_orders.orders_detail',compact('result'));
    }
}
