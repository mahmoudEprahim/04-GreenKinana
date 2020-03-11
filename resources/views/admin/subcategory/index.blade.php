@extends('admin.index')
@section('title',trans('admin.categories'))
@section('content')
    @hasanyrole('writer|admin')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}} </h3>
        </div>
    @include('admin.layouts.message')
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            {!! $dataTable->table([
             'class' => 'table table-bordered table-striped table-hover'
             ],true) !!}
        </div>
    <!-- /.box-body -->
    </div>

    @else
        <div class="alert alert-danger">{{trans('admin.you_cannt_see_invoice_because_you_dont_have_role_to_access')}}</div>

        @endhasrole


@push('js')
    {!! $dataTable->scripts() !!}
@endpush
@endsection