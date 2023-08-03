<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;

class VendorOrdersController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        
        // Query Type 1
        // $result['orders']     =        Order::with(['orders_detail' => function($q){
        //                                             $q->with('products');
        //                                         }])
        //                                         ->whereHas('orders_detail', function($q){
        //                                             $q->whereHas('products', function($q){
        //                                                 $q->where('users_id',Auth::user()->id);    
        //                                             });
        //                                         })
        //                                         ->paginate('2');
        
        // Query Type 2
        $result['orders']     =        Order::with('orders_detail', 'orders_detail.products')
                                                ->whereHas('orders_detail.products', function($q){
                                                    $q->where('users_id',Auth::user()->id);    
                                                })
                                                ->paginate('2');
        
        return view('vendor_orders.main',compact('result'));
    }

    public function vendor_order_details(Request $request, $id=null)
    {
        $result['order_details'] = Order::With(['orders_detail','orders_address'])->where('id',decrypt($id))->get();   
        return view('vendor_orders.orders_detail',compact('result'));
    }
}
