<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderDetail;

use Illuminate\Database\QueryException;


class PaymentController extends Controller
{
    public function purchase_items(Request $request)
    {
        /*print_r($_POST);   
        echo $request->token;exit;*/

        $user_address = $_POST;
        $total_cart_amount = \Cart::session(Auth::user()->id)->getSubTotal();

        $user = Auth::user();
        try
        {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($request->token);
            $stripe_pay = $user->charge($total_cart_amount * 100, $request->token);        

            /* Update Order Details and remove cart */
            $this->updateOrderDetails($user, $user_address, $stripe_pay);

            return redirect()->route('products')->with('success','Payment successful');
        }
        catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }        
    }

    public function updateOrderDetails($user, $user_address, $stripe_pay)
    {        
        /* Main Order Table Start */
        $order                      =   new Order();
        $order->users_id            =   Auth::user()->id;
        $order->stripe_pi_id        =   $stripe_pay->id;
        $order->stripe_resp         =   json_encode($stripe_pay);
        $order->total_amount        =   ( $stripe_pay->amount_received ) / 100;
        $order->save();
        /* Main Order Table end */


        /* Order Address Table Start */
        $order_addr                         =   new OrderAddress();
        $order_addr->order_id              =   $order->id;
        $order_addr->first_name             =   $user_address['first_name'];
        $order_addr->last_name              =   $user_address['last_name'];
        $order_addr->email                  =   $user_address['email'];
        $order_addr->mobile_number          =   $user_address['mobile_number'];
        $order_addr->address                =   $user_address['addr1'];
        $order_addr->city                   =   $user_address['city'];
        $order_addr->zipcode                =   $user_address['zipcode'];
        $order_addr->notes                  =   $user_address['message'];
        $order_addr->save();
        /* Order Address Table end */
        
        /* Order Products update from Cart start */
        $cart_items = \Cart::session(Auth::user()->id)->getContent();

        foreach($cart_items as $item)
        {
            $order_detail[] = [
                'order_id'        =>   $order->id,
                'products_id'      =>   $item->associatedModel->id,
                'price'            =>   $item->price,
                'qty'              =>   $item->quantity,
                'amount'           =>   $item->price * $item->quantity,
            ];
        }
        
        OrderDetail::insert($order_detail);
        /* Order Products update from Cart end */

        /* Clear the cart */
        \Cart::session(Auth::user()->id)->clear();
    }
}
