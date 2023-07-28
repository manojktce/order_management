<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Auth;

class CartController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function showCart()
    {
        $items = \Cart::session(Auth::user()->id)->getContent();
        return view('cart.main', compact('items'))->with('message', 'Welcome to product cart.');
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
        return redirect()->route('products')->with('message', 'Product Cart updated successfully.');
    }

    public function deleteCart(Request $request, $id=null)
    {
        $userID = Auth::user()->id;
        \Cart::session($userID)->remove($id);
    }

    public function clearCart(Request $request)
    {
        \Cart::session(Auth::user()->id)->clear();
        $items = \Cart::session(Auth::user()->id)->getContent();
        return view('cart.main', compact('items'))->with('message', 'Product Cart cleared successfully.');
    }
}
