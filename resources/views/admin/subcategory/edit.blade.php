@extends('admin.index')
@section('title',trans('admin.edit_category'))
@section('root_link', route('categories.index'))
@section('root_name', trans('admin.categories'))
@section('content')
    
<div class="box">
    @include('admin.layouts.message')
    <div class="box-header">
        <h3 class="box-title">{{$title}}</h3>
    </div>
    <div class="box-body">
        {!! Form::model($content,['method'=>'PUT','route' => ['categories.update',$content->id],'files'=>true]) !!}

        <div class="form-group row">
            
            <div class="col-md-2"> 
                {{ Form::label('Cat_No', trans('admin.Cat_No'), ['class' => 'control-label']) }}
                <div class="form-control"> {{ $content->Cat_No }}</div>
               
            </div>
            <div class="col-md-4">
                {{ Form::label(trans('admin.name_ar'), null, ['class' => 'control-label']) }}
                {{ Form::text('name_ar', old('name_ar'), array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-md-4">
                {{ Form::label(trans('admin.name_en'), null, ['class' => 'control-label']) }}
                {{ Form::text('name_en', old('name_en'), array_merge(['class' => 'form-control'])) }}
            </div>
        </div>

        <br>
        <div class="clearfix"></div>
            {{Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])}}
            <a href="{{aurl('categories')}}" class="btn btn-danger">{{trans('admin.back')}}</a>
            {!! Form::close() !!}
    </div>
</div>
    
@endsection

