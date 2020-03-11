@extends('admin.index')
@section('title',trans('admin.dashboard_setting'))
@section('content')
    @push('css')

        <link href="{{url('/')}}./setting_icon/css/icon-picker.min.css" media="all" rel="stylesheet" type="text/css" />


{{--        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>--}}
        <script src="{{url('/')}}./setting_icon/js/iconPicker.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $(".icon-picker").iconPicker();
            });
        </script>

        <style>
            .icon-popup
            {
                top: 919.264px !important;
                right: 279px !important;
                left: 0px !important;
                display: block !important;
                width: 18%;

            }

        </style>
<style>
    .move_menu
    {

    }
</style>
        @endpush


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{trans('admin.dashboard_setting')}} </h3>
        </div>
        <!-- /.box-header -->
        
        <div class="box-body">
            @include('admin.layouts.message')
            {!! Form::open(['route'=>'setting.save','files' => true]) !!}


        <div class="row form-group">
            <div class="col-sm-3">
                {{ Form::label(trans('admin.arabic_name'), null, ['class' => 'control-label']) }}
                {{ Form::text('sitename_ar', setting()->sitename_ar, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-sm-3">
                {{ Form::label(trans('admin.english_name'), null, ['class' => 'control-label']) }}
                {{ Form::text('sitename_en', setting()->sitename_en, array_merge(['class' => 'form-control'])) }}
            </div>
            
             <div class="col-sm-3">
                {{ Form::label(trans('admin.main_lang'), null, ['class' => 'control-label']) }}
                {{ Form::select('main_lang',['ar'=>trans('admin.ar'),'en'=>trans('admin.en')] , setting()->main_lang ,array_merge(['class' => 'form-control','placeholder'=>trans('admin.select')])) }}
            </div> 

            <div class="col-sm-3">
                {{ Form::label(trans('admin.logo'), null, ['class' => 'control-label']) }}
                {{ Form::file('logo_en', array_merge(['class' => 'form-control'])) }}
                @if(!empty(setting()->logo_en))
                    <img src="{{asset('public/storage/'.setting()->logo_en)}}" style="width: 50px; margin-top: 20px" class="img-responsive" >
                @endif
            </div>
        </div>

        

        <hr style="border-top: 1px solid #313131;">
        <h1 class="text-center">{{ trans('admin.qinana_added_val') }}</h1>
        <div class="form-group row">
            <div class="col-sm-4">
                {{ Form::label(trans('admin.qinana_added_val_en'), null, ['class' => 'control-label']) }}
                {{ Form::textarea('qinana_added_val_en', setting()->qinana_added_val_en , array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-sm-4">
                {{ Form::label(trans('admin.qinana_added_val_ar'), null, ['class' => 'control-label']) }}
                {{ Form::textarea('qinana_added_val_ar', setting()->qinana_added_val_ar , array_merge(['class' => 'form-control'])) }}
            </div>
        </div>

        <hr style="border-top: 1px solid #313131;">
        <h1 class="text-center">{{ trans('admin.about_us_section') }}</h1>
        <div class="form-group row">
            <div class="col-sm-3">
                {{ Form::label(trans('admin.abou_us_bg_img'), null, ['class' => 'control-label']) }}
                {{ Form::file('abou_us_bg_img', array_merge(['class' => 'form-control'])) }}
                @if(!empty(setting()->abou_us_bg_img))
                    <img src="{{asset('public/storage/'.setting()->abou_us_bg_img)}}" style="width: 50px; margin-top: 20px" class="img-responsive" >
                @endif
            </div>
       
            <div class="col-sm-4">
                {{ Form::label(trans('admin.about_site_en'), null, ['class' => 'control-label']) }}
                {{ Form::textarea('about_site_en', setting()->about_site_en, array_merge(['class' => 'form-control'])) }}
            </div> 
            <div class="col-sm-4">
                {{ Form::label(trans('admin.about_site_ar'), null, ['class' => 'control-label']) }}
                {{ Form::textarea('about_site_ar', setting()->about_site_ar, array_merge(['class' => 'form-control'])) }}
            </div> 
        </div>

        <hr style="border-top: 1px solid #313131;">
        <h1 class="text-center">{{ trans('admin.footer_section') }}</h1>
        <div class="row form-group">
            <div class="col-sm-3">
                {{ Form::label(trans('admin.email'), null, ['class' => 'control-label']) }}
                {{ Form::email('email', setting()->email, array_merge(['class' => 'form-control'])) }}
            </div>

            <div class="col-md-3">
                {{ Form::label(trans('admin.phone'), null, ['class' => 'control-label']) }}
                {{ Form::text('phone', setting()->phone, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-md-3">
                {{ Form::label(trans('admin.phone_2'), null, ['class' => 'control-label']) }}
                {{ Form::text('phone_2', setting()->phone_2, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-sm-3">
                {{ Form::label(trans('admin.facebook'), null, ['class' => 'control-label']) }}
                {{ Form::text('facebook', setting()->facebook, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-sm-3">
                {{ Form::label(trans('admin.inistgram'), null, ['class' => 'control-label']) }}
                {{ Form::text('instagram', setting()->instagram, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-sm-3">
                {{ Form::label(trans('admin.snapshat'), null, ['class' => 'control-label']) }}
                {{ Form::text('snapshat', setting()->snapshat, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-sm-3">
                {{ Form::label(trans('admin.pinterest'), null, ['class' => 'control-label']) }}
                {{ Form::text('pinterest', setting()->pinterest, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-sm-3">
                {{ Form::label(trans('admin.youtube'), null, ['class' => 'control-label']) }}
                {{ Form::text('youtube', setting()->youtube, array_merge(['class' => 'form-control'])) }}
            </div>
        </div>
            
        <div class="form-group row">
            <div class="col-sm-3">
                {{ Form::label(trans('admin.address_ar'), null, ['class' => 'control-label']) }}
                {{ Form::textarea('address_en', setting()->address_en, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-sm-3">
                {{ Form::label(trans('admin.address_en'), null, ['class' => 'control-label']) }}
                {{ Form::textarea('address_ar', setting()->address_ar, array_merge(['class' => 'form-control'])) }}
            </div>
            <div class="col-sm-6">
                {{ Form::label(trans('admin.keyword'), null, ['class' => 'control-label']) }}
                {{ Form::textarea('keyword', setting()->keyword, array_merge(['class' => 'form-control'])) }}
            </div>
        </div>
        
    
        
            

        {{Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])}}
        <a href="{{aurl('dashboard')}}" class="btn btn-danger">{{trans('admin.back')}}</a>
        {!! Form::close() !!}

        </div>
    </div>

@endsection
