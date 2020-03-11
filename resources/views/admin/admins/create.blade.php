@extends('admin.index')
@section('title', trans('admin.Create_new_admin'))
@section('root_link', route('admins.index'))
@section('root_name', trans('admin.admins'))
@section('content')

<div class="box">
    @include('admin.layouts.message')
    <div class="box-header">
        <h3 class="box-title">{{$title}}</h3>
    </div>
    <div class="box-body">
        {!! Form::open(['method'=>'POST','route' => 'admins.store','files'=>true]) !!}
        <div class="form-group">
            {{ Form::label(trans('admin.name'), null, ['class' => 'control-label']) }}
            {{ Form::text('name', old('name'), array_merge(['class' => 'form-control'])) }}
        </div>
        <div class="form-group">
            {{ Form::label(trans('admin.email'), null, ['class' => 'control-label']) }}
            {{ Form::email('email', old('email'), array_merge(['class' => 'form-control'])) }}
        </div>
        <div class="form-group">
            {{ Form::label(trans('admin.password'), null, ['class' => 'control-label']) }}
            {{ Form::password('password', array_merge(['class' => 'form-control'])) }}
        </div>
        <div class="form-group">
            {{ Form::label(trans('admin.image'), null, ['class' => 'control-label']) }}
            {{ Form::file('image', array_merge(['class' => 'form-control'])) }}
        </div>
        {{Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])}}
        <a href="{{aurl('admins')}}" class="btn btn-danger">{{trans('admin.back')}}</a>
{{--        <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>--}}
        {!! Form::close() !!}

    </div>
</div>
    

    <!-- <div class="alert alert-danger">{{trans('admin.you_cannt_see_invoice_because_you_dont_have_role_to_access')}}</div> -->

    







@endsection