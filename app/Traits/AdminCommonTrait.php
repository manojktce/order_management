<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\User;

use DataTables;

trait AdminCommonTrait
{
    public function __construct(Request $request)
    {
        $route = $request->route()->getName();
        
        $this->route_name = substr($route, 0, strpos($route, ".")); // route name
        $this->model_name = ucfirst($this->route_name);

        $this->model = 'App?Models?'.$this->model_name;
        $this->model = str_replace('?','\\',$this->model); // load current model
    }

    public function index(Request $request)
    {
        $info = array('title'=>ucfirst($this->route_name));
            
        if ($request->ajax()) {
            
            $result = $this->model::latest();
            
            return Datatables::of($result)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            
                            $btn ='<a href="'. route(''.$this->route_name.'.show', $row->id) .'" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                            <a href="' .route(''.$this->route_name.'.edit', $row->id) .'" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                            <a href="' .route(''.$this->route_name.'.delete', $row->id) .'" class="btn btn-outline-primary" onclick="return confirm_delete();"><i class="fa fa-trash"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.'.$this->route_name.'.index',compact('info'));
    }
}