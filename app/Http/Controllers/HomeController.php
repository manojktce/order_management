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
    public $categories;

    public function __construct()
    {
        $this->categories   =   Category::all();
    }
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
        $result                 =   array();
        $result['categories']   =   $this->categories;
        
        /* Used for filter option */
        if($request->ajax())
        {            
            $result['products']     =    Product::query()
                                    ->when($request->sort_name, function($q)use($request){
                                        $q->orderBy(''.$request->sort_name.'', ''.$request->sort_type.'');
                                    })
                                    ->paginate(3);
            return view('products_block', compact('result')); // block updated in seperate page and load dynamically
        }
        else
        {
            $result['products']     =   Product::latest()->paginate(3);
            return view('products',compact('result'));   
        }

    }

    public function product_detail(Request $request, $slug=null , $id=null)
    {
        $result                 =   array();
        $result['products']     =   Product::find($id);
        $result['categories']   =   $this->categories;
        return view('product_detail',compact('result'));   
    }
}
