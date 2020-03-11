@extends('admin.index')
@section('title',trans('admin.services'))
@section('root_link', route('services.index'))
@section('root_name', trans('admin.services'))
@section('content')
    
    
@push('js')
    <script>
        function myJsFunc() {
            var i = 0;
            ++i;
            var newInput = $('.new-row').html();
            $('.new-one').append(newInput);
        }
    </script>
@endpush
<div class="box">
    @include('admin.layouts.message')
    <div class="box-header">
        <h3 class="box-title">{{$title}}</h3>
    </div>
    <div class="box-body">
      

        {!! Form::open(['method'=>'POST','route' => 'services.store','files'=>true]) !!}
        

        <!--teacher name -->
        <div class="form-group row">
            <div class="col-md-4 ">
                {{ Form::label(trans('admin.desc_en'), null, ['class' => 'control-label']) }}
                {{ Form::text('desc_en', null, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-md-4 ">
                {{ Form::label(trans('admin.desc_ar'), null, ['class' => 'control-label']) }}
                {{ Form::text('desc_ar', null, array_merge(['class' => 'form-control'])) }}
            </div>

            <div class="col-md-4 required">
            {{ Form::label(trans('admin.image'), null, ['class' => 'control-label']) }}
            {{ Form::file('image', array_merge(['class' => 'form-control', 'required' => 'required'])) }}
            </div>
        </div>

        {{Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])}}
        <!-- <a href="{{aurl('services')}}" class="btn btn-danger">{{trans('admin.back')}} </a> -->
        {!! Form::close() !!}
        </div>
       
    </div>
</div>
        







@endsection
