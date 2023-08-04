<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\User;
use App\Models\Order;

use Auth;

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
        //$result                 =   array();
        $result['categories']   =   $this->categories;
        $result['model']        =   Product::all();
        $result['products']     =   Product::paginate(3);
        
        if(Auth::user())
        {
            $result['cart_items']   =   \Cart::session(Auth::user()->id)->getContent();
        }

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
        else
        {
            return view('products.main',compact('result'));   
        }        

    }

    public function product_detail(Request $request, $slug=null , $id=null)
    {
        //$result                 =   array();
        $result['products']     =   Product::find($id);
        $result['categories']   =   $this->categories;
        
        $result['total_ratings']    =   ProductRating::query()->Where('products_id',$id)->get();
        $result['ratings']          =   ProductRating::query()->Where('products_id',$id)->orderBy('id','desc')->paginate(2);


        return view('product_detail.main',compact('result'));   
    }

    public function add_review(Request $request, $id=null)
    {
        if(!Auth::user())
        {
            return redirect()->back()->with('error', 'Kindly login and add review.');
        }

        ProductRating::updateOrCreate(
            //where condition block start
            [
                'users_id'    => Auth::user()->id,
                'products_id' => decrypt($id),
            ], 
            //where condition block end
            [
                'rating'    => $request->input('stars'),
                'review'    => $request->input('message'),
            ]
        );
        

        return redirect()->back()->with('success', 'Review Added Successfully.');
    }
}
