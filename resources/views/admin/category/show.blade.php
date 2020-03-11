@extends('admin.index')
@section('title',trans('admin.show_category'))
@section('root_link', route('categories.index'))
@section('root_name', trans('admin.categories'))
@section('content')

    <div class="box">
        @include('admin.layouts.message')
        <div class="box-header">
            <h3 class="box-title">{{trans('admin.categories')}} <span style="color:#f00">{{session_lang($content->name_en,$content->name_ar)}}</span> </h3>
        </div>
        <div class="box-body">

            <div class="form-group row">
                <div class="col-md-1"> 
                    {{ Form::label('Cat_No', trans('admin.Cat_No'), ['class' => 'control-label']) }}
                    <div class="form-control"> {{ $content->Cat_No }}</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    {{ Form::label(trans('admin.name_ar'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{$content->name_ar}}</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 ">
                    {{ Form::label(trans('admin.name_en'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{$content->name_en}}</div>
                </div>
            </div>

            </div>

           
        </div>
    </div>
@endsection
