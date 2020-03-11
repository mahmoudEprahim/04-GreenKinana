@extends('admin.index')
@section('title',trans('admin.reply_messages') )
@section('root_link', route('messages.index'))
@section('root_name', trans('admin.messages'))
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
            
                <div class="col-md-12">
                    {{ Form::label(trans('admin.message'), null, ['class' => 'control-label']) }}
                    <textarea class="form-control" name="" id="" cols="30" rows="10" disabled>{{ $content->message }}</textarea>
                    <!-- <div class="form-control">{{ $content->message }}</div> -->
                </div>    
            </div>  

            <hr>

            <h4>Reply on a message</h4>

            <form method="post" action="{{ route('message.reply' , ['id' => $content->id ]) }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea class="form-control" name="message" cols="30" rows="10" ></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right"> Reply Message</button>
            </form>
                    
        </div>

    </div>
@endsection
