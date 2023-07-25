<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

use Exception;
use Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Route;

trait AdminCommonTrait
{
    public function __construct(Request $request)
    {
        $route = Route::currentRouteName();
        
        $this->route_name = substr($route, 0, strpos($route, ".")); // route name
        $this->model_name = ucfirst($this->route_name);

        $this->model = 'App?Models?'.$this->model_name;
        $this->model = str_replace('?','\\',$this->model); // load current model

        $this->viewFolder = 'User';
    }

    public function _informations($model="")
    {
        $data               =   array();
        $data['title']      =   ucfirst($this->route_name); 
        $data['role_name']  =   ($model) ? $this->_role_name($model) : '';             
        return $data;
    }

    public function index(Request $request)
    {        
        $dt = "\\App\\DataTables\\".$this->model_name."DataTable";
        $dataTable = new $dt;

        $info = $this->_informations();
        return $dataTable->render("admin.".$this->route_name.".index", compact('info'));
    }

    public function create()
    {
        $selectLookups              =   $this->_selectLookups();
        $selectLookups['status']    =   $this->_status();        
        
        $info = $this->_informations();
        return view("admin.".$this->route_name.".create",compact('info','selectLookups'));
    }

    public function store(Request $request)
    {
        $validator = $this->_validate($request , '' , 'store');
        
        if($validator != null && array_key_exists("error_message", $validator == null ? [] : $validator)){
            return back()->withInput()->with('error',implode('<br>',$validator['error_message']));
        }

        $model = $this->model::create($request->all());
        
        if($this->model_name == 'User')
        {
            $model->assignRole($request->input('user_type'));
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $model->addMediaFromRequest('image')->toMediaCollection('profile_pictures');
            }
        }
  
        return redirect()->route(''.$this->route_name.'.index')->with('message', 'Record Created Successfully.');;
    }


    public function show(string $id)
    {
        $result = $this->model::find($id);

        $info = $this->_informations($result);
        return view('admin.'.$this->route_name.'.show',compact('info','result'));
    }

    public function edit(string $id)
    {
        $result = $this->model::find($id);
        
        $selectLookups              =   $this->_selectLookups();
        $selectLookups['status']    =   $this->_status();        

        $info = $this->_informations();
        return view('admin.'.$this->route_name.'.edit',compact('info','selectLookups','result'));
    }


    public function update(Request $request, $id)
    {
        $validator = $this->_validate($request , $id , 'update');
        
        if($validator != null && array_key_exists("error_message", $validator == null ? [] : $validator)){
            return back()->withInput()->with('error',implode(' ',$validator['error_message']));
        }

        $model = $this->model::find($id);
        $model->update($request->all());
        
        if($this->model_name == 'User')
        {
            $role_name = $this->_role_name($model); 

            $model->removeRole($role_name); //Remove Previously assigned roles
            $model->assignRole($request->input('user_type'));

            if($request->hasFile('image') && $request->file('image')->isValid()){
                $model->media()->delete(); // delete previous uploaded image in db
                $model->addMediaFromRequest('image')->toMediaCollection('profile_pictures');
            }
        }
  
        return redirect()->route(''.$this->route_name.'.index')->with('message', 'Record updated successfully.');;
    }

    public function destroy(string $id)
    {
        echo "s";exit;
        $this->model::find($id)->delete();
        return redirect()->back()->with('error', 'Record Deleted Successfully.');
    }

    protected function _selectLookups($id = null) :array
    {
        return [
            //
        ];
    }

    protected function _validation_rules($request, $id) :array
    {
        return [
            //
        ];
    }

    protected function _store_validation_rules($request, $id) :array
    {
        return [
            //
        ];
    }

    protected function _update_validation_rules($request, $id) :array
    {
        return [
            //
        ];
    }

    /**
     * @return array
     */
    protected function _validation_messages() :array
    {
        return [
            //
        ];
    }


    private function _status()
    {
        $status = array('1' => 'Active' , '0' => 'Inactive');    
        return $status;
    }

    private function _roles()
    {
        $user_type = Role::pluck('name', 'name')->skip(1)->toArray();    
        return $user_type;
    }

    private function _role_name($model)
    {
        $role_name = $model->roles->pluck('name');
        return preg_replace('/[^A-Za-z0-9\-]/', '', $role_name); // Removes special chars.
    }

    private function _validate($request, $id = null , $action = null)
    {
        // if($action == 'update')
        // {
        //     $rules = $this->_update_validation_rules($request, $id);
        // }
        // else
        // {
        //     $rules = $this->_store_validation_rules($request, $id);
        // }

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
    
}