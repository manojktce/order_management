<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $category = Category::get();
            
            return Datatables::of($category)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            
                            $btn = '';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        $info = array('title'=>'Product Category');
        return view('admin.category.index',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = array('title'=>'Product Category');
        return view('admin.category.create',compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required',
        ]);
  
        $category = Category::create($request->all());
  
        return redirect()->route('category.index')->with('message', 'New Category Created Successfully.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
