<?php

namespace App\DataTables;

use App\Models\Product;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends BaseDataTable
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
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d');
            })
            ->addColumn('action', function ($model) {
                $action ='<a href="'. route('product.show', $model->id) .'" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                            <a href="' .route('product.edit', $model->id) .'" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" class="btn btn-outline-primary btndelete" data-id="' . $model->id . '" data-model="product" data-route="product" "><i class="fa fa-trash"></i></a>';

                return $action;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return Product::join('users', 'users.id', '=', 'products.user_id')->get(['products.id', 'products.title', 'products.description', 'products.price', 'products.created_at', 'users.first_name as added_by']);
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
                'dom'          => 'Bfrtip',
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
        return $columns = ['id', 'title', 'description', 'price', 'added_by', 'created_at'];
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