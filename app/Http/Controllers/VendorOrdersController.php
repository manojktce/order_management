<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;

class VendorOrdersController extends Controller
{
    public function index()
    {
        //$vendor_products = Product::Where('users_id',Auth::user()->id)->pluck('id');
        $user_id = Auth::user()->id;
        $result['orders'] = Order::join('orders_detail','orders_detail.order_id','=','orders.id')
                            ->join('products','products.id','=','orders_detail.products_id')
                            ->join('users','users.id','=','products.users_id')
                            ->where('products.users_id',$user_id)
                            ->select('orders.id','orders.stripe_pi_id','orders.total_amount','orders.created_at')
                            ->paginate('2');
        return view('vendor_orders.main',compact('result'));
    }

    public function vendor_order_details(Request $request, $id=null)
    {
        $result['order_details'] = Order::With(['orders_detail','orders_address'])->where('id',decrypt($id))->get();   
        return view('vendor_orders.orders_detail',compact('result'));
    }
}
