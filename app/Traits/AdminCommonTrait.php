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
}