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
            {!! Form::model($content,['method'=>'PUT','route' => ['videos.update',$content->id],'files'=>true]) !!}
            
             <div class="form-group row">

                <div class="col-md-4">
                    {{ Form::label(trans('admin.video_src'), null, ['class' => 'control-label']) }}
                    {{ Form::text('video_src',null, array_merge(['class' => 'form-control'])) }}
                </div>

                <div class="col-md-4">
                   {{ Form::label(trans('admin.name_en'), null, ['class' => 'control-label']) }}
                   {{ Form::text('name_en',old('name_en'), array_merge(['class' => 'form-control'])) }}
                </div>

                <div class="col-md-4">
                   {{ Form::label(trans('admin.name_ar'), null, ['class' => 'control-label']) }}
                   {{ Form::text('name_ar',old('name_ar'), array_merge(['class' => 'form-control'])) }}
                </div>
                
                
                <div class="col-md-6">
                    {{ Form::label(trans('admin.desc_en'),null, ['class' => 'control-label']) }}
                    {{ Form::textarea('desc_en',old('desc_en'), array_merge(['class' => 'form-control'])) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label(trans('admin.desc_ar'),null, ['class' => 'control-label']) }}
                    {{ Form::textarea('desc_ar',old('desc_ar'), array_merge(['class' => 'form-control'])) }}
                </div>

            </div>
               

            <div class="form-group row">
                <div class="col-sm-6" style="height: 317px;">
                     @if($content->video_src != null)
                        <iframe width="100%" height="100%" src="{{$content->video_src}}" style="margin-top: 10px" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    @endif
                </div>
            </div>
                
            <br>
            <div class="clearfix"></div>
            {{Form::submit(trans('admin.edit'),['class'=>'btn btn-primary'])}}
            <a href="{{aurl('videos')}}" class="btn btn-danger">{{trans('admin.back')}}</a>
            {!! Form::close() !!}
        </div>
    </div>
    







@endsection
