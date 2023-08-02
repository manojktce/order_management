<?php

namespace App\DataTables;

use App\Models\Product;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use DB;
use Auth;
class VendorProductDataTable extends BaseDataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
            return datatables($query)
            ->editColumn('category', function ($model) {
                return $model->category->title;
            })
            ->addColumn('status', function ($model) {
                $status_button = ($model->status == 1) ? '<a href="javascript:void(0)" class="btn btn-sm btn-success">Active</a>' : '<a href="javascript:void(0)" class="btn btn-sm btn-danger">In-Active</a>';
                return $status_button;
            })
            ->editColumn('created_at', function ($model) {
                 return $model->created_at->format('Y-m-d');
            })
            ->addColumn('action', function ($model) {
                $action ='<a href="'. route('vendor_product.show', $model->id) .'" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                            <a href="' .route('vendor_product.edit', $model->id) .'" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" class="btn btn-outline-primary btndelete" data-id="' . $model->id . '" data-model="vendor_product" data-route="vendor_product" "><i class="fa fa-trash"></i></a>';

                return $action;
            })
            ->rawColumns(['status','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model::with(['category','users'])->where('products.users_id',Auth::user()->id)->select('products.*');
        //return $model->newQuery();        
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $params = $this->getBuilderParameters();
        $params['order'] = [[0, 'asc']];
        $params['buttons'] = [];
        $actionParam['width'] = '210px';

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction($this->getActionParamters())
            ->parameters([
                //'dom'          => 'Bfrtip',
                //'buttons'      => ['export', 'print', 'reset', 'reload'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        //return $columns = ['id', 'category', 'title', 'price', 'added_by'];
        return 
        [    
            ['name' => 'category.title' , 'title' => 'Category', 'data' => 'category'],
            ['name' => 'title' , 'title' => 'Title', 'data' => 'title'],
            ['name' => 'price' , 'title' => 'Price', 'data' => 'price'],
            ['name' => 'status' , 'title' => 'Status', 'data' => 'status'],
            ['name' => 'created_at' , 'title' => 'Created At', 'data' => 'created_at'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    // protected function filename()
    // {
    //     return 'User_' . date('YmdHis');
    // }
}
