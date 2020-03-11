@extends('admin.index')
@section('title',trans('admin.images'))
@section('root_link', route('images.index'))
@section('root_name', trans('admin.images'))
@section('content')
   

    <div class="box">
        @include('admin.layouts.message')
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    {{ Form::label(trans('admin.name_en'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{$content->name_en}}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    {{ Form::label(trans('admin.name_ar'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{$content->name_ar}}</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    {{ Form::label(trans('admin.desc_en'), null, ['class' => 'control-label']) }}
                    <div class="form-group">{{$content->desc_en}}</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label(trans('admin.desc_en'), null, ['class' => 'control-label']) }}
                    <div class="form-group">{{$content->desc_en}}</div>
                </div>
            </div>
            <div class="form-group row">  
                <div class="col-sm-6">
                    @if($content->image != null)
                    <img src="{{asset($content->image)}}" class="img-responsive" alt="">
                    @endif
                </div>
            </div>
            <br>
            <div class="clearfix"></div>
            <a href="{{aurl('images')}}" class="btn btn-danger">{{trans('admin.back')}}</a>
        </div>
    </div>
   
@endsection