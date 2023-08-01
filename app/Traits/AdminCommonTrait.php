<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
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
        $data['role_name']  =   ($model == 'User') ? $this->_role_name($model) : '';              
        return $data;
    }

    public function index(Request $request)
    {        
        //User::onlyTrashed()->restore();
        $dt = "\\App\\DataTables\\".$this->model_name."DataTable";
        $dataTable = new $dt;
        $info = $this->_informations();

        return $dataTable->render("admin.".$this->route_name.".index", compact('info'));
    }

    public function create()
    {
        $selectLookups              =   $this->_selectLookups();
        $info = $this->_informations();

        return view("admin.".$this->route_name.".create",compact('info','selectLookups'));
    }

    public function store(Request $request)
    {
        $validator = $this->_validate($request , '' , 'store');
        
        if($validator != null && array_key_exists("error_message", $validator == null ? [] : $validator)){
            return back()->withErrors($validator)->with('error','Input errors !!!');
        }

        $model = $this->model::create($request->all());
        
        $additonal_updates  = $this->_additionalUpdate($request, '', $model);
        $file_uploads       = $this->_fileupload($request, '', $model);
  
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
        $selectLookups              =   $this->_selectLookups($id);
        $info = $this->_informations();

        return view('admin.'.$this->route_name.'.edit',compact('info','selectLookups','result'));
    }


    public function update(Request $request, $id)
    {
        $validator = $this->_validate($request , $id , 'update');
        
        if($validator != null && array_key_exists("error_message", $validator == null ? [] : $validator)){
            return back()->withErrors($validator)->with('error','Input errors !!!');
        }
        
        $model = $this->model::find($id);
        $model->update($request->all());
        
        $additonal_updates  = $this->_additionalUpdate($request, $id, $model);
        $file_uploads       = $this->_fileupload($request, $id, $model);
  
        return redirect()->route(''.$this->route_name.'.index')->with('message', 'Record updated successfully.');
    }

    public function destroy(string $id)
    {
        $this->model::find($id)->delete();
        //return response()->json(['url'=>url(''.$this->route_name.'')]);
        //return back()->with('message','Deleted Successfully');
    }

    protected function _selectLookups($id = null) :array
    {
        return [
            //
        ];
    }


    protected function _additionalUpdate($request, $id = null, $model = null) : array
    {
        return [
            //
        ];
    }


    protected function _fileupload($request, $id = null, $model = null) : array
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

    /**
     * @return array
     */
    protected function _validation_messages() :array
    {
        return [
            //
        ];
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