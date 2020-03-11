@extends('admin.index')
@section('title',trans('admin.orders_information') )
@section('root_link', route('orders.index'))
@section('root_name', trans('admin.orders'))
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

            <div class="form-group row">
                
                <div class="col-md-3">
                    {{ Form::label(trans('admin.name'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{ $content->name }}</div>
                </div>
            
                <div class="col-md-3 ">
                    {{ Form::label(trans('admin.email'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{ $content->email }}</div>
                </div>
                <div class="col-md-3">
                    {{ Form::label(trans('admin.phone'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{ $content->phone }}</div>
                </div>
            

                <div class="col-md-3">
                    {{ Form::label('grade_id', trans('admin.order_id'), ['class' => 'control-label']) }}
                    <div class="form-control">{{session_lang($content->service->desc_en,$content->service->desc_ar)}}</div>
                </div>

                <div class="col-md-12">
                    {{ Form::label(trans('admin.message'), null, ['class' => 'control-label']) }}
                    <textarea class="form-control" name="" id="" cols="30" rows="10" disabled>{{ $content->message }}</textarea>
                    <!-- <div class="form-control">{{ $content->message }}</div> -->
                </div>    
            </div>            
        </div>

    </div>
@endsection
