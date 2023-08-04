<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

use Auth;

class ProductController extends BaseController
{
    public $modelClass = Product::class;

    public function show_reviews($id)
    {   
        $result = $this->modelClass::find($id);
        $info['title']      =   ucfirst('Product');
        return view('admin.product.view_review',compact('info','result'));   
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
