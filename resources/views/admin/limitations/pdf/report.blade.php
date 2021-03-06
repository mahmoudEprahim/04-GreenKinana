<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
</head>
<style>
    body {
        font-family: 'dejavu sans', sans-serif;
        direction:rtl;
        text-align:right;
        padding:0;
        margin: 0;
    }.el-date{
         float: right;
         width: 40%
     }
    .el-date p{
        font-size: 12px;
        margin: 0 20px -25px;
        padding: 15px 0;
    }
    .el-no3{
        width:100%;
        display:block;
        margin:0 auto;
        text-align:center;
    }
    .el-no3 span{
        padding: 5px 20px !important;
        font-weight: bold;
        font-size: 12px;
    }
    .clearfix{
        clear:both;
    }
    .table{
        width: 100%;
        text-align: center;
        font-size: 10px;
        margin-top: 20px;
        border:1px solid #000
    }
    .table th{
        text-align: center;
        font-size: 11px;
    }
    .table td{
        text-align: right;
    }
    .table td, .table th {
        padding: .5rem;
        vertical-align: middle;
        border: 1px solid #000000 !important;
    }
    .text-center{
        text-align: center;
    }
    #block_chain{
        background: #ccc;
    }
    @page {
        margin: 5px 30px !important;
        padding: 5px!important;
    }
    .hidden{
        display: none;
    }
</style>
<body style="margin-bottom: 250px">

<div style="padding-top:30px">
    <div style="float:right;font-weight:bold;width:50%">{{setting()->sitename_ar}}</div>
    <div style="float:left;font-weight:bold;width:50%;text-align:left">{{setting()->sitename_en}}</div>
</div>
<div style="text-align:center">
    <img src="{{asset('storage/'. setting()->icon)}}" style="max-width:100px;margin:15px 0">
</div>

<div class="el-no3">
    <span>{{\App\Enums\dataLinks\LimitationsType::getDescription($limitations->limitationReceipts->limitationReceiptsId)}}</span>
    <span>{{trans('admin.number')}} {{$limitations->limitationId}}</span>
</div>

<div class="clearfix"></div>
<div class="el-date">
    <p>{{trans('admin.date')}}: {{date('d-m-Y', strtotime($limitations->created_at))}}</p>
</div>


<div class="clearfix"></div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tr>
                <th rowspan="2">{{trans('admin.line')}}</th>
                <th colspan="2">{{trans('admin.information_account')}}</th>
                <th rowspan="2">{{trans('admin.single_cc')}}</th>
                <th rowspan="2">{{trans('admin.note_for')}}</th>
                <th rowspan="2">{{trans('admin.debtor')}}</th>
                <th rowspan="2">{{trans('admin.creditor')}}</th>
            </tr>
            <tr>
                <th>{{trans('admin.account_number')}}</th>
                <th>{{trans('admin.account_name')}}</th>
            </tr>
            <div class="hidden">{{ $i = 1 }}
                {{$balance = 0}}
                {{$dataDebtor = 0}}
                {{$dataCredit = 0}}
            </div>
            <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{$i++}}</td>
                    <td>@if($d->operation_id == 4) {{$d->departments->code}} @else {{$d->relation_id}} @endif</td>
                    <td>{{session_lang($d->name_en,$d->name_ar)}}</td>
                    <td style="max-width: 20px">
                        @if($d->glcc != null) {{session_lang($d->glcc->name_en,$d->glcc->name_ar)}} @endif
                    </td>
                    <td>
                    {{$d->note}}
                    </td>
                    <td style="text-align: center">@if($d->debtor != 0) {{$d->debtor}} @else 0  @endif</td>
                    <td style="text-align: center">@if($d->creditor != 0) {{$d->creditor}} @else 0  @endif</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align:center">{{trans('admin.Total_motion')}}</td>
                <td style="text-align: center">{{makeNumber2Text($data->sum('creditor'))}} {{trans('admin.EGP')}}</td>
                <td style="text-align: center">{{$data->sum('debtor')}}</td>
                <td style="text-align: center">{{$data->sum('creditor')}}</td>
            </tr>
            </tbody>

        </table>
    </div>

    <div style="position:absolute;bottom:50px;left:0;margin:0 25px;text-align:center">
        <br>
        <div class="table-responsive">
            <table class="text-center" style="width: 100%;">
                <tr>
                    <th style="text-align:center">{{trans('admin.Account')}}</th>
                    <th style="text-align:center">{{trans('admin.account_manager')}}</th>
                    <th style="text-align:center">{{trans('admin.general_manager')}}</th>
                </tr>
                <tr>
                    <td>-------------------------</td>
                    <td>-------------------------</td>
                    <td>-------------------------</td>
                </tr>
            </table>
        </div>
        <br>
        <div style="border: 2px solid #000; padding: 10px">
            <table>
                <tr>
                    <th style="text-align: right;padding: 5px 0">{{trans('admin.branche')}} :</th>
                    <td>{{ session_lang(\App\Branches::where('id',$limitations->branche_id)->first()->name_en,\App\Branches::where('id',$limitations->branche_id)->first()->name_ar) }}</td>
                </tr>
                <tr>
                    <th style="text-align: right;padding: 5px 0">{{trans('admin.sUrl')}} :</th>
                    <td>{{\App\Branches::where('id',$limitations->branche_id)->first()->addriss}}</td>
                </tr>
                <tr>
                    <th style="text-align: right;padding: 5px 0">{{trans('admin.phone')}} :</th>
                    <td>{{setting()->phone}}</td>
                </tr>
                <tr>
                    <th style="text-align: right;padding: 5px 0">{{trans('admin.email')}} :</th>
                    <td>{{setting()->email}}</td>
                </tr>
            </table>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>
