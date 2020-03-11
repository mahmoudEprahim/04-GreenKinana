@extends('admin.index')
@section('title',trans('admin.categories'))
@section('root_link', route('categories.index'))
@section('root_name', trans('hr.create_category'))
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


        {!! Form::open(['method'=>'POST','route' => 'categories.store','files'=>true]) !!}

        <div class="form-group row">
            
            <div class="col-md-2"> 
                {{ Form::label('Cat_No', trans('admin.Cat_No'), ['class' => 'control-label']) }}
                {{Form::text('Cat_No', count(\App\Category::all()) != 0?\App\Category::orderBy('id', 'DESC')->latest()->first()->Cat_No+1:1,['class' => 'form-control Cat_No', 'readonly'])}}
            </div>
            
        
            <div class="col-md-4">
                {{ Form::label(trans('admin.name_ar'), null, ['class' => 'control-label']) }}
                {{ Form::text('name_ar', null, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-md-4">
                {{ Form::label(trans('admin.name_en'), null, ['class' => 'control-label']) }}
                {{ Form::text('name_en', null, array_merge(['class' => 'form-control'])) }}
            </div>

        </div>

            <div class="clearfix"></div>
            {{Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])}}
            <a href="{{aurl('categories')}}" class="btn btn-danger">{{trans('admin.back')}}</a>
            {!! Form::close() !!}
        </div>

    </div>
</div>

@endsection