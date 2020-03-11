<?php

namespace App\DataTables;

use App\applicants_requests;
use App\Enums\ExperianceType;
use Yajra\DataTables\Services\DataTable;

class applicantRequestDataTable extends DataTable
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
                return '<a href="applicantrequest/'.$query->id.'/edit" class="btn btn-success edit"><i class="fa fa-edit"></i> </a>';
            })

            ->addColumn('degree', function ($query) {
                return  \App\Enums\DegreeType::getDescription($query->degree);
            })

            ->addColumn('job', function ($query) {
                return session_lang($query->job['name_en'],$query->job['name_ar']);
            })

            ->addColumn('jobSpec', function ($query) {
                return session_lang($query->jobSpec['name_en'],$query->jobSpec['name_ar']);
            })

            ->addColumn('companies', function ($query) {
                foreach ($query->companies as $query->company) {
                return '<a href="companies/'.$query->company->id.'">' . $query->company->name_ar . '</a>';
                }
            })

            ->addColumn('delete', 'admin.applicantrequest.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'degree',
                'job',
                'jobSpec',
                'companies',
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
        return applicants_requests::query()->where('applicants_requests.status',1)->with(['companies']);
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
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [
                    [10,25,50,100,-1],[10,25,50,trans('admin.all_record')]
                ],
                'buttons' => [
                    [
                        'text' => '<i class="fa fa-plus"></i> ' . trans('admin.add_new_applicant_request'),
                        'className' => 'btn btn-primary create',
                        'action' => 'function( e, dt, button, config){ 
                                             window.location = "applicantrequest/create";
                                         }',
                    ],
                    ['extend' => 'print','className' => 'btn btn-primary' , 'text' => '<i class="fa fa-print"></i>'],
                    ['extend' => 'excel','className' => 'btn btn-success' , 'text' => '<i class="fa fa-file"></i> ' . trans('admin.EXCEL')],
                    ['extend' => 'reload','className' => 'btn btn-info' , 'text' => '<i class="fa fa-refresh"></i>']
                ],
                "initComplete" => "function () {
                                    this.api().columns([1]).every(function () {
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

            ['name'=>'applicants_requests.id','data'=>'id','title'=>trans('admin.id')],
            ['name'=>'companies.name_ar','data'=>'companies','title'=>trans('admin.company')],
            ['name'=>'degree','data'=>'degree','title'=>trans('admin.qualifications')],
            ['name'=>'job','data'=>'job','title'=>trans('admin.job_name')],
            ['name'=>'jobSpec','data'=>'jobSpec','title'=>trans('admin.job_spec')],
            ['name'=>'count','data'=>'count','title'=>trans('admin.count')],
            ['name'=>'experiences','data'=>'experiences','title'=>trans('admin.experiences')],
            ['name'=>'salary_from','data'=>'salary_from','title'=>trans('admin.salary_from')],
            ['name'=>'salary_to','data'=>'salary_to','title'=>trans('admin.salary_to')],
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
        return 'applicantRequest_' . date('YmdHis');
    }
}
