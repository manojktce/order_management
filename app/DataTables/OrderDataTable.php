<?php

namespace App\DataTables;

use App\Models\Order;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends BaseDataTable
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
            ->editColumn('purchased_by', function ($model) {
                return $model->users->first_name;
            })
            ->editColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function ($model) {
                $action ='<a href="'. route('order.show', $model->id) .'" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>';
                return $action;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model::with(['users','orders_address','orders_detail','products'])->select('orders.*');
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
            ->parameters($params);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['name' => 'id' , 'title' => 'Order ID', 'data' => 'id'],
            ['name' => 'stripe_pi_id' , 'title' => 'Reference ID', 'data' => 'stripe_pi_id'],
            ['name' => 'total_amount' , 'title' => 'Total Amount', 'data' => 'total_amount'],
            ['name' => 'users.first_name' , 'title' => 'Purchased By', 'data' => 'purchased_by'],
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
