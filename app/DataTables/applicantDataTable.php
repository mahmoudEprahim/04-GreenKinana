<?php

namespace App\DataTables;

use App\Applicant;
use Yajra\DataTables\Services\DataTable;

class applicantDataTable extends DataTable
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
                return '<a href="applicants/'.$query->id.'/edit" class="btn btn-success edit"><i class="fa fa-edit"></i>  </a>';
            })
            ->addColumn('show', function ($query) {
                return '<a href="applicants/'.$query->id.'" class="btn btn-info"><i class="fa fa-eye"></i>  </a>';
            })
            ->addColumn('job_specifications', function ($query) {
                return $query->name_en;
            })
            ->addColumn('phone_1', function ($query) {
                return $query->phone_1 . '<a href="https://wa.me/2' .$query->phone_1.'" target="_blank" style="padding-right: 15px;">  <i class="fa fa-whatsapp" style="font-size: 25px;color: #25d366"></i> </a>';
            })
            ->addIndexColumn()

            ->addColumn('delete', 'admin.applicants.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'show',
                'job_specifications',
                'index',
                'phone_1'


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
        return Applicant::query()->join('job_specifications', 'applicants.job_spec_id', '=', 'job_specifications.id')->select(['applicants.*', 'job_specifications.name_en'])->where('status',2);
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
                                'text' => '<i class="fa fa-plus"></i> ' . trans('admin.add_new_applicant'),
                                'className' => 'btn btn-primary create',
                                'action' => 'function( e, dt, button, config){ 
                                             window.location = "applicants/create";
                                         }',
                            ],
                            ['extend' => 'print','className' => 'btn btn-primary' , 'text' => '<i class="fa fa-print"></i>'],
                            ['extend' => 'excel','className' => 'btn btn-success' , 'text' => '<i class="fa fa-file"></i> ' . trans('admin.EXCEL')],
                            ['extend' => 'reload','className' => 'btn btn-info' , 'text' => '<i class="fa fa-refresh"></i>']
                        ],
                        "initComplete" => "function () {
                            this.api().columns([1,2,3,4]).every(function () {
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
            ['name'=>'applicant_num','data'=>'applicant_num','title'=>trans('admin.applicant_num')],
            ['name'=>'phone_1','data'=>'phone_1','title'=>trans('admin.phone_1')],
            ['name'=>'job_specifications.name_ar','data'=>'job_specifications','title'=>trans('admin.job_spec')],
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
        return 'driver_' . date('YmdHis');
    }
}
