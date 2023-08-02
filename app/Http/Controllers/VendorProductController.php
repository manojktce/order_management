<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class VendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Product::onlyTrashed()->restore();
        $dt = "\\App\\DataTables\\VendorProductDataTable";
        $dataTable = new $dt;
        return $dataTable->render("vendor_products.main");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = Product::find($id);
        $selectLookups              =   $this->_selectLookups($id);
        $info = $this->_informations();

        return view('vendor_products.edit',compact('info','selectLookups','result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
    }

    public function _informations($model="")
    {
        $data               =   array();
        $data['title']      =   "Vendor Product"; 
        $data['role_name']  =   ($model == 'User') ? $this->_role_name($model) : '';              
        return $data;
    }

    protected function _selectLookups($id = null) :array
    {
        $data = array();

        $data['users_id']   = Auth::user()->id;
        $data['users']      = User::all()->pluck('first_name','id')->toArray();
        $data['category']   = Category::with('product')->pluck('title','id')->toArray();

        return $data;
    }
}
