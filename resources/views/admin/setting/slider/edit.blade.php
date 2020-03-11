@extends('admin.index')
@section('title',trans('admin.sliders'))
@section('content')
    @hasanyrole('writer|admin')
    <div class="box">
        @include('admin.layouts.message')
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
    <div class="box-body">
    {!! Form::model($slider,['method'=>'PUT','route' => ['sliders.update',$slider->id],'files'=>true]) !!}


        <!--teacher name -->
        <div class="form-group row">
            <!-- <div class="col-md-6"> -->
                <!-- {{ Form::label(trans('admin.desc_en'), null, ['class' => 'control-label']) }} -->
                <!-- {{ Form::text('desc_en', old('desc_en'), array_merge(['class' => 'form-control'])) }} -->
            <!-- </div> -->
            <!-- <div class="col-md-6"> -->
                <!-- {{ Form::label(trans('admin.desc_ar'), null, ['class' => 'control-label']) }} -->
                <!-- {{ Form::text('desc_ar', old('desc_ar'), array_merge(['class' => 'form-control'])) }} -->
            <!-- </div> -->


        </div>
        <div class="form-group row">

                <div class="col-md-4 required">
                    {{ Form::label(trans('admin.image'), null, ['class' => 'control-label']) }}
                    {{ Form::file('image', array_merge(['class' => 'form-control'])) }}
                </div>
            @if($slider->image != null)
            <div class="col-md-4 ">
                    {{ Form::label(trans('admin.image'), null, ['class' => 'control-label']) }}
                  <img src="{{asset('public/storage/'.$slider->image)}}" style="width: 100%; height:100%" >
                </div>
            @endif
        </div>
        {{Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])}}
        <!-- <a href="{{aurl('sliders')}}" class="btn btn-danger">{{trans('admin.back')}} </a> -->
        {!! Form::close() !!}
        </div>

    </div>
    @else
        <div class="alert alert-danger">{{trans('admin.you_cannt_see_invoice_because_you_dont_have_role_to_access')}}</div>

        @endhasanyrole
@endsection
