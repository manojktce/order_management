<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Auth;

class CartController extends Controller
{
    public function showCart()
    {
        $items = \Cart::session(Auth::user()->id)->getContent();
        return view('cart.main', compact('items'));
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
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => $Product
        ));
        return redirect()->route('products')->with('message', 'Record updated successfully.');
    }

    public function clearCart(Request $request)
    {
        \Cart::session(Auth::user()->id)->clear();
        $items = \Cart::session(Auth::user()->id)->getContent();
        return view('cart.main', compact('items'));
    }
}
