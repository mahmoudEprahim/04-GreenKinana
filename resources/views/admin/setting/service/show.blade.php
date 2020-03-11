@extends('admin.index')

@section('content')
    <div class="box">
        <div class="container-fluid">
            <div class="row">
                <div class="box-header">
                    <h3 class="box-title">{{trans('admin.service_Info')}}</h3>
                </div>
                <hr>
                <div class="col-md-8">
                    <div class="box-body">
                        <h3 >{{ $service->desc }}</h3><br>
                        <hr>
                        <img src="{{asset('storage/'. $service->image)}}" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="well" style="margin-top: 20px;">
                        <div>
                            <label>{{trans('admin.Created_At')}}:</label>
                            <p>{{ date('M j, Y H:i A', strtotime($service->created_at)) }}</p>
                        </div>
                        <div>
                            <label>{{trans('admin.Last_Update_At')}}:</label>
                            <p>{{ date('M j, Y h:i A', strtotime($service->updated_at)) }}</p>
                        </div>
                        <hr>
                        <div class="row text-center">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('services.edit', trans('admin.edit'), array($service->id), array('class' => 'btn btn-primary btn-block')) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit(trans('admin.delete'), ['class' => 'btn btn-danger btn-block']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Html::linkRoute('services.index', trans('admin.All_Services'), [], ['class' => 'btn btn-default btn-block', 'style' => 'margin-top:18px']) }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection