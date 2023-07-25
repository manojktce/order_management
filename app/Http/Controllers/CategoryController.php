<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends BaseController
{
    public $modelClass = Category::class;

    protected function _validation_rules($request, $id = null): array
    {
        $rules = [
            'title'                 => 'required|unique:category,title,'.$id.',id',
        ];

        return $rules;
    }
}
