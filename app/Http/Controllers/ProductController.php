<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public $modelClass = Product::class;

    protected function _selectLookups($id = null) :array
    {
        $data = array();

        $data['users']      = User::all()->pluck('first_name','id')->toArray();
        $data['category']   = Category::with('product')->pluck('title','id')->toArray();

        return $data;
    }

    protected function _fileupload($request, $id = "", $model = "") : array
    {

        if($request->hasFile('image')){
            
            $images = $request->file('image');

            if($id)
            {
                $model->clearMediaCollection('product_images');
            }
            
            foreach ($images as $image) {
                $model->addMedia($image)->toMediaCollection('product_images');
            }
        }

        $msg = ['File Uploaded'];
        return $msg;
    }

    protected function _validation_rules($request, $id = null): array
    {
        $rules = [
            'users_id'              => 'sometimes|required',
            'title'                 => 'required|min:3|max:10|unique:products,title,'.$id.',id',
            'description'           => 'required|min:3|max:20',
            'price'                 => 'required',
            'qty'                   => 'required',
        ];

        return $rules;
    }
}
