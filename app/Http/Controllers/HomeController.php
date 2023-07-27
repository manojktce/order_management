<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function signin()
    {
        return view('signin');
    }

    public function products(Request $request, $id=null)
    {
        //$result  = Category::all();
        //$result  =   Product::whereHas('category')->latest()->paginate(2);
        $result                 =   array();
        $result['products']     =   Product::paginate(2);
        $result['categories']   =   Category::all();
        return view('products',compact('result'));   
    }

    public function product_detail(Request $request, $slug=null , $id=null)
    {
        $result                 =   array();
        $result['products']     =   Product::find($id);
        $result['categories']   =   Category::all();
        return view('product_detail',compact('result'));   
    }
}
