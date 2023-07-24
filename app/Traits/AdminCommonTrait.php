<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

use Exception;
use Validator;

trait AdminCommonTrait
{
    public function __construct(Request $request)
    {
        $route = $request->route()->getName();
        
        $this->route_name = substr($route, 0, strpos($route, ".")); // route name
        $this->model_name = ucfirst($this->route_name);

        $this->model = 'App?Models?'.$this->model_name;
        $this->model = str_replace('?','\\',$this->model); // load current model

        $this->viewFolder = 'User';
    }

    public function index(Request $request)
    {
        $info = array('title'=>ucfirst($this->route_name));
        
        $dt = "\\App\\DataTables\\".$this->model_name."DataTable";
        $dataTable = new $dt;
        return $dataTable->render("admin.".$this->route_name.".index", compact('info'));
    }

    public function create()
    {
        $info = array('title'=>ucfirst($this->route_name));
        return view("admin.".$this->route_name.".create",compact('info'));
    }

    public function store(Request $request)
    {
        $validator = $this->_store_validate($request);
        
        if($validator != null && array_key_exists("error_message", $validator == null ? [] : $validator)){
            return back()->withInput()->with('error',implode(' ',$validator['error_message']));
        }

        $model = $this->model::create($request->all());
        
        if($this->model_name == 'User')
        {
            $model->assignRole($request->input('user_type'));
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $model->addMediaFromRequest('image')->toMediaCollection('images');
            }
        }
  
        return redirect()->route(''.$this->route_name.'.index')->with('message', 'Record Created Successfully.');;
    }


    public function show(string $id)
    {
        $result = $this->model::find($id);
        $info = array('title'=>ucfirst($this->route_name));
        return view('admin.'.$this->route_name.'.show',compact('result','info'));
    }

    public function edit(string $id)
    {
        $result = $this->model::find($id);
        $info = array('title'=>ucfirst($this->route_name));
        return view('admin.'.$this->route_name.'.edit',compact('result','info'));
    }


    public function update(Request $request, $id)
    {
        $validator = $this->_update_validate($request);
        
        if($validator != null && array_key_exists("error_message", $validator == null ? [] : $validator)){
            return back()->withInput()->with('error',implode(' ',$validator['error_message']));
        }

        $model = $this->model::find($id);
        $model->update($request->all());
        
        if($this->model_name == 'User')
        {
            $model->assignRole($request->input('user_type'));

            if($request->hasFile('image') && $request->file('image')->isValid()){
                $model->addMediaFromRequest('image')->toMediaCollection('images');
            }
        }
  
        return redirect()->route(''.$this->route_name.'.index')->with('message', 'Record updated successfully.');;
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

    private function _store_validate($request, $id = null)
    {
        $rules = $this->_store_validation_rules($request, $id);

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

    private function _update_validate($request, $id = null)
    {
        $rules = $this->_update_validation_rules($request, $id);

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