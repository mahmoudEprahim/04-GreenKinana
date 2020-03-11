@extends('admin.index')
@section('title',trans('admin.reply_orders') )
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
                
                <div class="col-md-4">
                    {{ Form::label(trans('admin.name'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{ $content->name }}</div>
                </div>
            
                <div class="col-md-4 ">
                    {{ Form::label(trans('admin.email'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{ $content->email }}</div>
                </div>
                <div class="col-md-4">
                    {{ Form::label(trans('admin.phone'), null, ['class' => 'control-label']) }}
                    <div class="form-control">{{ $content->phone }}</div>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-md-8 text-center" style="margin: 5% 0;">
                    {{ Form::label('order', trans('admin.order'), ['class' => 'text-center control-label']) }}
                    <div class="form-control">{{session_lang($content->service->desc_en,$content->service->desc_ar)}}</div>
                </div>   
            </div>  
            <div class="form-group">
                <div class="col-md-12 mb-3" style="margin-bottom: 3%;">
                    {{ Form::label(trans('admin.message'), null, ['class' => 'control-label']) }}
                    <textarea class="form-control" name="" id="" cols="30" rows="10" disabled>{{ $content->message }}</textarea>
                    <!-- <div class="form-control">{{ $content->message }}</div> -->
                </div> 
            </div>

            <hr>

            <h4 class="text-center">Reply on a message</h4>

            <form class="form-group" method="post" action="{{ route('order.reply' , ['id' => $content->id ]) }}">
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" name="message" cols="30" rows="10" ></textarea>
                    </div>
                </div>
                <button style="margin-top:2%" type="submit" class="btn btn-primary pull-right"> Reply Message</button>
            </form>
                    
        </div>

    </div>
@endsection
