@extends('admin.index')
@section('title',trans('admin.videos'))
@section('root_link', route('videos.index'))
@section('root_name', trans('admin.videos'))
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
            <div class="form-group">
                <div class="col-sm-6" style="height: 300px;margin-bottom:40px;">
                        @if($content->video_src != null)
                        <iframe width="100%" height="100%" src="{{$content->video_src}}" style="margin-top: 10px; margin-bottom:20px" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    @endif
                </div>
            </div>  
            
            <br>
            <div class="clearfix"></div>
            <a href="{{aurl('videos')}}" class="btn btn-danger">{{trans('admin.back')}}</a>
        </div>
    </div>
   
@endsection