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
        $result['products']     =   Product::latest()->paginate(3);
        /* Used for filter option */
        if($request->ajax())
        {            
            $result['products'] =   Product::query()
                                    /* Dropdown */
                                    ->when($request->sort_name, function($q)use($request){
                                        $q->orderBy(''.$request->sort_name.'', ''.$request->sort_type.'');
                                    })
                                    /* Search Box */
                                    ->when($request->search_name, function($q)use($request){
                                        $q->where('title', 'like', '%'.$request->search_name.'%');
                                    })
                                    /* Category Checklist Selection */
                                    ->when($request->category, function($q)use($request){
                                        $q->whereHas('category', function ($q)use($request) {
                                            $q->whereIn('id',explode(',', $request->category));
                                        });
                                    })
                                    /* Price Slider */
                                    ->when($request->price, function($q)use($request){
                                        $q->whereBetween('price', explode(',', $request->price));
                                    })
                                    ->paginate(3);

            return view('products.include.products_block', compact('result')); // block updated in seperate page and load dynamically
        }
        
        return view('products.main',compact('result'));   

    }

    public function product_detail(Request $request, $slug=null , $id=null)
    {
        $result                 =   array();
        $result['products']     =   Product::find($id);
        $result['categories']   =   $this->categories;
        return view('products.product_detail',compact('result'));   
    }
}
