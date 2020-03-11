@extends('admin.index')
@section('title', trans('admin.Edit_admin'))
@section('root_link', route('admins.index'))
@section('root_name', trans('admin.admins'))
@section('content')
@hasrole('admin')
    <div class="box">
        @include('admin.layouts.message')
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <div class="box-body">
            {!! Form::model($admin,['method'=>'PUT','route' => ['admins.update',$admin->id],'files'=>true]) !!}
    
            <div class="form-group">
                {{ Form::label( trans('admin.name'), null, ['class' => 'control-label']) }}
                {{ Form::text('name', $admin->name, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="form-group">
                {{ Form::label( trans('admin.email'), null, ['class' => 'control-label']) }}
                {{ Form::email('email', $admin->email, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="form-group">
                {{ Form::label( trans('admin.password'), null, ['class' => 'control-label']) }}
                {{ Form::password('password', array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="form-group">
                {{ Form::label( trans('admin.image'), null, ['class' => 'control-label']) }}
                {{ Form::file('image', array_merge(['class' => 'form-control'])) }}
                <img src="{{asset('public/storage/'.$admin->image)}}" style="width: 100px">
            </div>
            {{Form::submit( trans('admin.save'),['class'=>'btn btn-primary'])}}
            <a href="{{aurl('admins')}}" class="btn btn-danger">{{trans('admin.back')}}</a>
            {!! Form::close() !!}
        </div>
    </div>

@else
    <div class="alert alert-danger">{{trans('admin.you_cannt_see_invoice_because_you_dont_have_role_to_access')}}</div>

    @endhasrole






@endsection