<?php

namespace App\DataTables;

use App\Video;
use Yajra\DataTables\Services\DataTable;

class VideosDataTable extends DataTable
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
        ->addColumn('edit', function ($query) {
            return '<a href="videos/'.$query->id.'/edit" class="btn btn-success edit"><i class="fa fa-edit"></i></a>';
        })
        ->addColumn('show', function ($query) {
            return '<a href="videos/'.$query->id.'" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>  </a>';
        })

        ->addColumn('delete', 'admin.pages.videos.btn.delete')
        ->addIndexColumn()
        ->rawColumns([
            'edit',
            'delete',
            'show',
        ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Video $model)
    {
        return $model->query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */

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



    public function html()
    {
        return $this->builder()
            ->addIndex()
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
                    [10,25,50,100,-1],[10,25,50,trans('admin.all_record')]
                ],
                'buttons' => [
                    [
                        'text' => '<i class="fa fa-five"></i> ' . trans('admin.add_slider'),
                        'className' => 'btn btn-primary create',
                        'action' => 'function( e, dt, button, config){ 
                                             window.location = "'.\URL::current().'/create";
                                         }',
                    ],
                    // ['extend' => 'print','className' => 'btn btn-primary' , 'text' => '<i class="fa fa-print"></i>'],
                    // ['extend' => 'excel','className' => 'btn btn-success' , 'text' => '<i class="fa fa-file"></i> ' . trans('admin.EXCEL')],
                    ['extend' => 'reload','className' => 'btn btn-info' , 'text' => '<i class="fa fa-refresh"></i>']
                ],
                "initComplete" => "function () {
                            this.api().columns([]).every(function () {
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
            ['name'=>'name_'.session('lang'),'data'=>'name_'.session('lang'),'title'=>trans('admin.name')],
            ['name'=>'desc_'.session('lang'),'data'=>'desc_'.session('lang'),'title'=>trans('admin.desc')],
            ['name'=>'show','data'=>'show','title'=>trans('admin.show'),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
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
        return 'Videos_' . date('YmdHis');
    }
}
