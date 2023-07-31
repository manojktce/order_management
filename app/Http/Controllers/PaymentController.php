<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
class PaymentController extends Controller
{
    public function purchase_items(Request $request)
    {
        /*print_r($_POST);   
        echo $request->token;exit;*/
        
        $user_address = $_POST;

        $user = Auth::user();
        try
        {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($request->token);
            $stripe_pay = $user->charge(13 * 100, $request->token);        

            /* Update Order Details and remove cart */
            $this->updateOrderDetails($user, $user_address, $stripe_pay);

        }
        catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }        
    }

    public function updateOrderDetails($user, $user_address, $stripe_pay)
    {
        echo "<pre>"; print_r($user);
        echo "<pre>"; print_r($user_address);
        echo "<pre>"; print_r($stripe_pay);
        exit;

        $order      =   new Order();

        //return redirect()->route('products')->with('success','Payment successful');
    }
}
