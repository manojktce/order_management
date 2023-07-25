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

        /* Role name based on ID */
        if($id)
        {
            $user = User::find($id);
            $data['role_name'] = $user->roles->pluck('name')->implode(',');
        }
        
        return $data;
    }

    protected function _additionalUpdate($request, $id = "", $model = "") : array
    {
        /* Role Create & Update */
        if(empty($id))
        {
            $model->assignRole($request->input('user_type'));    
        }
        else
        {
            $role_name = preg_replace('/[^A-Za-z0-9\-]/', '', $model->roles->pluck('name'));
            $model->removeRole($role_name); //Remove Previously assigned roles
            $model->assignRole($request->input('user_type'));
        }
        /* Role Update */

        $msg = ['Role Updated'];
        return $msg;
    }

    protected function _fileupload($request, $id = "", $model = "") : array
    {
        if($request->hasFile('image') && $request->file('image')->isValid()){
            if($id)
            {
                $model->media()->delete(); // delete previous uploaded image in db
            }
            $model->addMediaFromRequest('image')->toMediaCollection('profile_pictures');
        }

        $msg = ['File Uploaded'];
        return $msg;
    }

    protected function _validation_rules($request, $id = null): array
    {
        $rules = [
            'first_name'            => 'required|min:3|max:10',
            'last_name'             => 'required|min:3|max:10',
            'email'                 => 'required|email|unique:users,email,'.$id.',id',
            'password'              => 'sometimes|required|min:8|max:15|required_with:confirm_password|same:confirm_password',
            'confirm_password'      => 'sometimes|required|min:8|max:15'
        ];

        return $rules;
    }
}
