<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{trans('admin.login')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('/')}}/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/')}}/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('/')}}/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/adminlte/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/')}}/adminlte/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<div style="background-image:url({{url('/storage/background/1.jpeg')}});background-size: cover;display: flex; object-fit: cover;height: 100%;object-position: center;
    ">
    <div class="login-box">
        <div class="login-logo">
            <a style="color: #fff" href="#"><b>Info</b>SAS</a>
        </div>
    @include('admin.layouts.message')

    {{--<img src="{{asset('storage/background/2.jpg')}}">--}}
    <!-- /.login-logo -->
        <div class="login-box-body" style="background-color: #333333 !important;">
            {!! Form::open(['method'=>'post','action'=>'Admin\AdminAuth@dologin']) !!}
            <div class="form-group has-feedback">
                {{ Form::email('email',null,['class'=>'form-control','placeholder'=>trans('admin.email')]) }}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{ Form::password('password',['class'=>'form-control','placeholder'=>trans('admin.password')]) }}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remmberme"> {{trans('admin.Remember_Me')}}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    {{ Form::submit(trans('admin.login'),['class'=>'btn btn-primary btn-block btn-flat']) }}
                </div>
            {!! Form::close() !!}
            <!-- /.col -->
            </div>
            <!-- /.social-auth-links --> 

            <a href="{{aurl('forgetPassword')}}">{{trans('admin.forget_password')}}</a><br>

        </div>
        <!-- /.login-box-body -->
    </div>

</div>
<div class="footer_admin" style="width: 100%;
    height: 70px;
    background-color: #313132  !important;
    position: absolute;
    bottom: 0;
    left: 0;
    display: flex;
    justify-content: space-around;
    align-items: center;width: 100%;
    height: 70px;
    background-color: #b6e3e8;
    position: absolute;
    bottom: 0;
    left: 0;
    display: flex;
    justify-content: space-around;
    align-items: center;">
    <p class="left" style="float: left ;
    font-size: 20px;
    color: #fff;
  ">InfoSas company since 2001 <span style="color: red">contact us  </span> infosas.ics@gmail.com <span style="display: flex;"> T:01002610620 | T:01003461364 </span> </p>
    <img style="    width: 6%;
    height: 83%;" src="{{asset('/storage/icon/info.png')}}">
    <p style="float: right;
    font-size: 20px;
    direction: rtl;
color: #fff;
" class="right">
        شركه الاستشارية المتقدمة لنظم المعلومات منذ 2001 <span style="color: red">تواصل معنا</span>  infosas.ics@gmail.com
        <span style="display: flex;">ت: 01002610620 |
        ت : 01003461364</span>
    </p>
</div>
{{--infosas.ics@gmail.com--}}

<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{url('/')}}/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('/')}}/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{url('/')}}/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
