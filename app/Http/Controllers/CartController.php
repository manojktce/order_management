<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Auth;
use Stripe;

class CartController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function showCart()
    {
        $intent = Auth::user()->createSetupIntent();
        $items = \Cart::session(Auth::user()->id)->getContent();
        return view('cart.main', compact('items','intent'))->with('message', 'Welcome to product cart.');
    }
    public function addToCart(Request $request, $id=null)
    {
        $userID = Auth::user()->id;
        $Product = Product::find($id); // assuming you have a Product model with id, name, description & price
        $rowId = rand(2,100000); // generate a unique() row ID

        // add the product to cart
        \Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $Product->title,
            'price' => $Product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $Product
        ));
        return redirect()->route('showCart')->with('message', 'Product Added to Cart successfully.');
    }

    public function updateCart(Request $request, $id=null, $option=null)
    {
        $item = \Cart::session(Auth::user()->id)->get($id);
        $prod_id = $item->associatedModel->id;
        
        $userID =   Auth::user()->id;
        $rowId  =   $id;
        $Product = Product::find($prod_id);
        if($option == 1)
        {
            \Cart::session($userID)->update($rowId, array(
                'quantity' => 1,
                'price' => $Product->price,
            ));
        }
        else
        {
            \Cart::session($userID)->update($rowId, array(
                'quantity' => -1,
                'price' => $Product->price,
            ));
        }
        
            $intent = Auth::user()->createSetupIntent();
            $items = \Cart::session(Auth::user()->id)->getContent();
            return view('cart.include.cart_listing_block', compact('items','intent'));
        
    }

    public function deleteCart(Request $request, $id=null)
    {
        $userID = Auth::user()->id;
        \Cart::session($userID)->remove($id);

        $intent = Auth::user()->createSetupIntent();
        $items = \Cart::session(Auth::user()->id)->getContent();
        return view('cart.include.cart_listing_block', compact('items','intent'));
    }

    public function clearCart(Request $request)
    {
        \Cart::session(Auth::user()->id)->clear();
        
        $items = \Cart::session(Auth::user()->id)->getContent();
        return view('cart.main', compact('items'))->with('message', 'Product Cart cleared successfully.');
    }
}
