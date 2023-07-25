<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends BaseController
{
    public $modelClass = User::class;

    public function delUsers(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('error', 'User Record Deleted Successfully.');
    }

    protected function _selectLookups($id = "") :array
    {
        $data = array();
        $data['user_type'] = Role::pluck('name', 'name')->skip(1)->toArray();    
        return $data;
    }

    protected function _validation_rules($request, $id): array
    {
        if(empty($id))
        {
            $rules = [
                'first_name'            => 'required|min:3|max:10',
                'last_name'             => 'required|min:3|max:10',
                'email'                 => 'required|email|unique:users,email',
                'password'              => 'required|min:8|max:15|required_with:confirm_password|same:confirm_password',
                'confirm_password'      => 'required|min:8|max:15'
            ];
        }
        else
        {
            $user = User::find($id);
            $rules = [
                'first_name'            => 'required|min:3|max:10',
                'last_name'             => 'required|min:3|max:10',
                'email'                 => 'required|email|unique:users,email,'.$user->id.',id',
            ];
        }

        return $rules;
    }
}
