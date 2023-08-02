<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

use Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Route;

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
        $result = array();
        $selectLookups              =   $this->_selectLookups();
        $info = $this->_informations();

        return view('vendor_products.create',compact('info','selectLookups','result'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "<pre>"; print_r($_FILES);exit;
        $validator = $this->_validate($request , '' , 'store');
        
        if($validator != null && array_key_exists("error_message", $validator == null ? [] : $validator)){
            return back()->withErrors($validator)->with('error','Input errors !!!');
        }

        $model = Product::create($request->all());
        
        $additonal_updates  = $this->_additionalUpdate($request, '', $model);
        $file_uploads       = $this->_fileupload($request, '', $model);
  
        return redirect()->route('vendor_product.index')->with('message', 'Product Created Successfully.');;
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
        $validator = $this->_validate($request , $id , 'update');
        
        if($validator != null && array_key_exists("error_message", $validator == null ? [] : $validator)){
            return back()->withErrors($validator)->with('error','Input errors !!!');
        }
        
        $model = Product::find($id);
        $model->update($request->all());
        
        $additonal_updates  = $this->_additionalUpdate($request, $id, $model);
        $file_uploads       = $this->_fileupload($request, $id, $model);
  
        return redirect()->route('vendor_product.index')->with('message', 'Product updated successfully.');
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

    protected function _fileupload($request, $id = "", $model = "") : array
    {
        /* Upload cover image for the product start*/
        if($request->hasFile('cover_image') && $request->file('cover_image')->isValid()){
            if($id && $request->hasFile('cover_image'))
            {
                $model->clearMediaCollection('product_cover_image'); // delete previous uploaded image in db
            }
            $model->addMediaFromRequest('cover_image')->toMediaCollection('product_cover_image');
        }
        /* Upload cover image for the product end*/

        /* Upload product images for the product start*/
        if($request->hasFile('image')){
            
            $images = $request->file('image');

            if($id && $request->hasFile('image'))
            {
                $model->clearMediaCollection('product_images');
            }
            
            foreach ($images as $image) {
                $model->addMedia($image)->toMediaCollection('product_images');
            }
        }
        /* Upload product images for the product end*/

        $msg = ['File Uploaded'];
        return $msg;
    }
    
    protected function _additionalUpdate($request, $id = null, $model = null) : array
    {
        return [
            //
        ];
    }

    protected function _validation_messages() :array
    {
        return [
            //
        ];
    }
    private function _validate($request, $id = null , $action = null)
    {
        $rules = $this->_validation_rules($request, $id);
                
        if(@request()->all()){
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
                $messages = $validator->messages();
                
                foreach ($messages->all(':message') as $key => $message)
                {
                     $row['error_message'][$key] = $message;
                }
                return $row;
            }
        }else{
            $messages = $this->_validation_messages();
            $validator = $this->validate($request, $rules, $messages);
        }
    }

    protected function _validation_rules($request, $id = null): array
    {
        $rules = [
            'users_id'              => 'sometimes|required',
            'title'                 => 'required|min:2|max:75|unique:products,title,'.$id.',id',
            'description'           => 'required|min:3',
            'price'                 => 'required',
            'qty'                   => 'required',
            'cover_image'           => 'mimes:jpg,jpeg,png|max:4096',
            'image.*.file'          => 'mimes:jpg,jpeg,png|max:4096',
        ];

        return $rules;
    }
}
