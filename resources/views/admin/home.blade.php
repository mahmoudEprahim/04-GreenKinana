@extends('admin.index')

@section('content')

@push('css')
<style>
    .small-box h3{
        color: #fff;
    }
</style>

@endpush

    <div class="row">

    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                @if (auth()->guard('admin')->user()->branches_id != null)
                    @if (auth()->guard('admin')->user())
                        <h3></h3>
                    @else
                        <h3>{{count(\App\Branches::find(auth()->guard('admin')->user()->branches_id)->company)}}</h3>
                    @endif
                @else
                <a href="{{url('admin/students')}}">
                    <h3>{{trans('admin.students_accounts')}}</h3>
                </a>
                    
                @endif
                <p></p>
            </div>
            <div class="icon">
                <!-- <i class="fa fa-users"></i> -->
            </div>
        </div>
    </div>
        
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                @if (auth()->guard('admin')->user() != null)
                    @if (auth()->guard('admin')->user())
                        <h3></h3>
                    @else
                        <h3>{{count(\App\Branches::find(auth()->guard('admin')->user()->branches_id)->applicants)}}</h3>
                    @endif
                @else
                    <h3>0</h3>
                @endif

                <p>{{trans('admin.classes_information')}}</p>
            </div>
            <div class="icon">
                <!-- <i class="fa fa-id-card"></i> -->
            </div>
        </div>
    </div>
       
        
        <!-- <div class="col-lg-3 col-xs-6">
            
            <div class="small-box bg-yellow">
                <div class="inner">
                    @if (auth()->guard('admin')->user() != null)
                        @if (auth()->guard('admin')->user())
                            <h3></h3>
                        @else
                        @endif
                    @else
                        <h3>0</h3>
                    @endif

                    <p>{{trans('admin.orders')}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-first-order"></i>
                </div>
            </div>
        </div> -->
        
        <!-- <div class="col-lg-3 col-xs-6">
            
            <div class="small-box bg-red">
                <div class="inner">
                    @if (auth()->guard('admin')->user() != null)
                        @if (auth()->guard('admin')->user())
                            <h3>/h3>
                        @else
                            <h3>{{count(\App\Branches::find(auth()->guard('admin')->user()->branches_id)->applicants)}}</h3>
                        @endif
                    @else
                        <h3>{{trans('admi.students')}}</h3>
                    @endif

                    <p>{{trans('admin.accepted')}}</p>
                </div>
                <div class="icon">
                    <i class="fa fa-suitcase"></i>
                </div>
            </div>
        </div> -->
        
        
        <div class="row">
    <!--<section class="col-lg-6 connectedSortable">-->
            
            

    <!--        <div class="box box-info">-->
    <!--            <div class="box-header">-->
    <!--                <i class="fa fa-envelope"></i>-->

    <!--                <h3 class="box-title">{{trans('admin.Quick_Email')}}</h3>-->
                    
    <!--                <div class="pull-right box-tools">-->
    <!--                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"-->
    <!--                            title="{{trans('admin.Remove')}}">-->
    <!--                        <i class="fa fa-times"></i></button>-->
    <!--                </div>-->
    <!--                                </div>-->
    <!--            <div class="box-body">-->
    <!--                <div class="form-group">-->
    <!--                    <input type="email" class="form-control" name="emailto" placeholder="{{trans('admin.Email_to')}} :">-->
    <!--                </div>-->
    <!--                <div class="form-group">-->
    <!--                    <input type="text" class="form-control" name="subject" placeholder="{{trans('admin.Subject')}}">-->
    <!--                </div>-->
    <!--                <div>-->

    <!--              <textarea class="textarea" name="contents" placeholder="{{trans('admin.Message')}}"-->
    <!--                        style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="box-footer clearfix">-->

                   
    <!--        </div>-->
    <!--        </div>-->
    <!--                   <div class="box box-solid bg-light-blue">-->
    <!--            <div class="box-header">-->
                    
    <!--                <div class="pull-right box-tools">-->
    <!--                    <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"-->
    <!--                            data-toggle="tooltip" title="{{trans('admin.Collapse')}}" style="margin-right: 5px;">-->
    <!--                        <i class="fa fa-minus"></i></button>-->
    <!--                </div>-->
                    

    <!--                </div>-->
    <!--            </div>-->
                
            
    <!--    </section>-->
   </div>
    
    <!-- <div class="row">
       
        <section class="col-lg-6 connectedSortable">
            
            

            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-envelope"></i>

                    <h3 class="box-title">{{trans('admin.Quick_Email')}}</h3>
                    
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                title="{{trans('admin.Remove')}}">
                            <i class="fa fa-times"></i></button>
                    </div>
                                    </div>
                <div class="box-body">
                    <div class="form-group">
                        <input type="email" class="form-control" name="emailto" placeholder="{{trans('admin.Email_to')}} :">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="{{trans('admin.Subject')}}">
                    </div>
                    <div>

                  <textarea class="textarea" name="contents" placeholder="{{trans('admin.Message')}}"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>
                <div class="box-footer clearfix">

                   
            </div>
            </div>
                       <div class="box box-solid bg-light-blue">
                <div class="box-header">
                    
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                                data-toggle="tooltip" title="{{trans('admin.Collapse')}}" style="margin-right: 5px;">
                            <i class="fa fa-minus"></i></button>
                    </div>
                    

                    </div>
                </div>
                
            
        </section>
        </div>
         -->
        <section class="col-lg-6 connectedSortable">
        </section>
        
    </div>
    


@endsection
