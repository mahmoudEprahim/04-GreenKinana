<?php

namespace App\DataTables;

use App\Admin;
use App\User;
use Yajra\DataTables\Services\DataTable;

class AdminsDataTable extends DataTable
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
            ->addColumn('permission', 'admin.admins.btn.tags')
            ->addColumn('edit', function ($query) {
                return '<a href="admins/'.$query->id.'/edit" class="btn btn-success"><i class="fa fa-edit"></i> </a>';
            })
            
            ->addColumn('delete', 'admin.admins.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'permission',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Admin::query()->orderByDesc('id');
    }
    public static function lang(){
        $langJson = [
            "sProcessing"=> trans('admin.sProcessing'),
            "sZeroRecords"=> trans('admin.sZeroRecords'),
            "sEmptyTable"=> trans('admin.sEmptyTable'),
            "sInfoFiltered"=> trans('admin.sInfoFiltered'),
            "sSearch"=> trans('admin.sSearch'),
            "sUrl"=> trans('admin.sUrl'),
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
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
//                    ->parameters($this->getBuilderParameters());
                    ->parameters([
                    'dom' => 'Blfrtip',
                    'lengthMenu' => [
                        [10,25,50,100,-1],[10,25,50,trans('admin.all_record')]
                    ],
                    'buttons' => [
                        [
                            'text' => '<i class="fa fa-plus"></i> ' . trans('admin.Create_new_admin'),
                            'className' => 'btn btn-primary create',
                            'action' => 'function( e, dt, button, config){ 
                             window.location = "admins/create";
                         }',
                        ],[
                            'text' => '<i class="fa fa-flag"></i> ' . trans('admin.Roles'),
                            'className' => 'btn btn-primary',
                            'action' => 'function( e, dt, button, config){ 
                             window.location = "roles";
                         }',
                        ],
                        [ 
                            'text' => '<i class="fa fa-flag"></i> ' . trans('admin.Permissions'),
                            'className' => 'btn btn-primary',
                            'action' => 'function( e, dt, button, config){ 
                             window.location = "permissions";
                         }',
                        ],
                        ['extend' => 'print','className' => 'btn btn-primary' , 'text' => '<i class="fa fa-print"></i>'],
                        ['extend' => 'excel','className' => 'btn btn-success' , 'text' => '<i class="fa fa-file"></i> ' . trans('admin.EXCEL')],
                        ['extend' => 'reload','className' => 'btn btn-info' , 'text' => '<i class="fa fa-refresh"></i>']
                    ],
                    "initComplete" => "function () {
                    this.api().columns([0,1,2,3]).every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
        
                            column.search(val ? val : '', true, false).draw();
                        });
                    });
                    }",
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
            ['name'=>'created_at','data'=>'created_at','title'=>trans('admin.created_at')],
            ['name'=>'updated_at','data'=>'updated_at','title'=>trans('admin.updated_at')],
            ['name'=>'permission','data'=>'permission','title'=>trans('admin.permission') ,'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
            ['name'=>'edit','data'=>'edit','title'=>trans('admin.edit'),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
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
        return 'Admins_' . date('YmdHis');
    }
}
