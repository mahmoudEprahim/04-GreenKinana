<?php

namespace App\DataTables;

use App\Order;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTabe extends DataTable
{
    
    public function dataTable($query)
    {
        return datatables($query)
       
        ->addColumn('edit', function ($query) {
            return '<a href="orders/'.$query->id.'/edit" class="btn btn-success edit"><i class="fa fa-edit"></i></a>';
        })
        ->addColumn('show', function ($query) {
            return '<a href="orders/'.$query->id.'" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>  </a>';
        })
        ->addColumn('order_id',function($query){
            return session_lang($query->service->desc_en,$query->service->desc_ar);
        })

        
        
        ->addColumn('delete', 'admin.orders.btn.delete')
        ->rawColumns([
            'delete',
            'show',
            'edit',
            'order_id',
        ]);
    }

   
    public function query()
    {
        return Order::query()->orderByDesc('id');
    }

    public static function lang(){
        $langJson = [
            "sProcessing"=> trans('admin.sProcessing'),
            "sZeroRecords"=> trans('admin.sZeroRecords'),
            "sEmptyTable"=> trans('admin.sEmptyTable'),
            "sInfoFiltered"=> trans('admin.sInfoFiltered'),
            "sSearch"=> trans('admin.sSearch'),
                
            "sInfoThousands"=> trans('admin.sInfoThousands'),
            "sLoadingRecords"=> trans('admin.sLoadingRecords'),
            "oPaginate"=> [
                "sFirst"=> trans('admin.sFirst'),
                "sLast"=> trans('admin.sLast'),
                "sNext"=> trans('admin.sNext'),
                "sPrevious"=> trans('admin.sPrevious')
            ],
            "oAria"=> [
                "sSortAscending"=> trans('admin.sSortAscending'),
                "sSortDescending"=> trans('admin.sSortDescending')
            ]
        ];
        return $langJson;
    }
    
    public function html()
    {

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addColumnBefore([
                'defaultContent' => '',
                'data'           => 'DT_RowIndex',
                'name'           => 'DT_RowIndex',
                'title'          => trans('admin.id'),
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',

            ])
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [
                    [5,10,25,50,100,-1],[5,10,25,50,trans('admin.all_record')]
                ],
                'buttons' => [
                    // [
                    //     'text' => '<i class="fa fa-plus"></i> ' . trans('admin.create_user_profile'),
                    //     'className' => 'btn btn-primary create',
                    //     'action' => 'function( e, dt, button, config){
                    //          window.location = "'.\URL::current().'/create";
                             
                    //      }',
                    // ],
                    ['extend' => 'print','className' => 'btn btn-primary' , 'text' => '<i class="fa fa-print"></i>'],
                    ['extend' => 'excel','className' => 'btn btn-success' , 'text' => '<i class="fa fa-file"></i> ' . trans('admin.EXCEL')],
                    ['extend' => 'reload','className' => 'btn btn-info' , 'text' => '<i class="fa fa-refresh"></i>']
                ],
                "language" =>  self::lang(),

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            
           
            ['name'=>'name','data'=>'name','title'=>trans('admin.name')],
            ['name'=>'email','data'=>'email','title'=>trans('admin.email')],
            ['name'=>'phone','data'=>'phone','title'=>trans('admin.phone')],
            ['name'=>'message','data'=>'message','title'=>trans('admin.message')],
            ['name'=>'order_id','data'=>'order_id','title'=>trans('admin.order_id')],
            
            ['name'=>'edit','data'=>'edit','title'=>trans('admin.edit'),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
            ['name'=>'show','data'=>'show','title'=>trans('admin.show'),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
            ['name'=>'delete','data'=>'delete','title'=>trans('admin.delete'),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],

        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'LibraryVideosDataTabe_' . date('YmdHis');
    }
}
