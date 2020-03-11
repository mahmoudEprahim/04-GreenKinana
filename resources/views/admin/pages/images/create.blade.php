@extends('admin.index')
@section('title',trans('admin.images'))
@section('root_link', route('images.index'))
@section('root_name', trans('admin.images'))
@section('content')
    
    
@push('js')
    <script>
        function myJsFunc() {
            var i = 0;
            ++i;
            var newInput = $('.new-row').html();
            $('.new-one').append(newInput);
        }

        // add another new video
        $(document).ready(function () {
            $('#appendSubCat').click(function (e) {
                
                e.preventDefault();
                let parentDiv = $('.appendDiv');
                parentDiv.append(`
                <div class="form-group" >
                    <div class="row">
                        <div class="col-md-4">
                            <label for="Image" class="control-label">Image</label>
                            <input name="image[]" type="file">
                        </div>
                        <div class="col-md-4">
                            <label for="Arabic name" class="control-label">Arabic Name</label> 
                            <input id="Arabic name" name="name_ar[]" type="text" class="form-control">
                        </div> 
                        <div class="col-md-4">
                            <label for="English name" class="control-label">English Name</label> 
                            <input id="English name" name="name_en[]" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="English Description" class="control-label">English Description</label> 
                            <textarea id="English Description" name="desc_en[]" cols="50" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="Arabic Description" class="control-label">Arabic Description</label> 
                            <textarea id="Arabic Description" name="desc_ar[]" cols="50" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                        
                       <a style="margin-right: 10px" id="deleteLink" onclick="$(this).parent().remove()" class="btn btn-danger" href="#"><i class="fa fa-close"></i></a>
                   </div>
                `);
            });
        })

    </script>
@endpush
<div class="box">
    @include('admin.layouts.message')
    <div class="box-header">
        <h3 class="box-title">{{$title}}</h3>
    </div>
    <div class="box-body">
      

        {!! Form::open(['method'=>'POST','route' => 'images.store','files'=>true]) !!}
        
        <div class="appendDiv">
            <div class="form-group row">
                
                <div class="col-md-4">
                    {{ Form::label(trans('admin.image'), null, ['class' => 'control-label']) }}
                    {{ Form::file('image[]',null, array_merge(['id'=>'image','class' => 'form-control'])) }}
                </div>
                <div class="col-md-4">
                   {{ Form::label(trans('admin.name_ar'), null, ['class' => 'control-label']) }}
                   {{ Form::text('name_ar[]',null, array_merge(['id'=>'Arabic name','class' => 'form-control'])) }}
                </div>
                <div class="col-md-4">
                   {{ Form::label(trans('admin.name_en'), null, ['class' => 'control-label']) }}
                   {{ Form::text('name_en[]',null, array_merge(['id'=>'English name','class' => 'form-control'])) }}
                </div>
                
            </div>
            <div class="form-group row">
                
                <div class="col-md-6">
                    {{ Form::label(trans('admin.desc_en'), null, ['class' => 'control-label']) }}
                    {{ Form::textarea('desc_en[]',null, array_merge(['id'=> 'English Description','class' => 'form-control'])) }}
                </div>

                <div class="col-md-6">
                   {{ Form::label(trans('admin.desc_ar'), null, ['class' => 'control-label']) }}
                   {{ Form::textarea('desc_ar[]',null, array_merge(['id'=>'Arabic Description','class' => 'form-control'])) }}
                </div>
                
            </div>

            <div class="form-group">
            <a id="appendSubCat" href="#" class="btn btn-success" style="margin-right: 10px;"><i class="fa fa-plus"></i></i></a>
            </div>
        </div>
            
            
            <br>
            <div class="clearfix"></div>
            {{Form::submit(trans('admin.save'),['class'=>'btn btn-primary'])}}
            <a href="{{aurl('videos')}}" class="btn btn-danger">{{trans('admin.back')}}</a>
            {!! Form::close() !!}
            </div>
        

        

        


       
    </div>
</div>
        







@endsection
