<style>
    .read{
        background: #CCCCCC;
    }
</style>
<header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>INFO</b>SAS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-bell-o"></i>--}}
{{--                        <span class="label label-warning count">{{auth()->guard('admin')->user()->unreadNotifications->where('type','App\Notifications\subscriber')->count()}}</span>--}}
{{--                    </a>--}}
                    <ul class="dropdown-menu">
{{--                        <li class="header">{{trans('admin.You_have')}} {{auth()->guard('admin')->user()->unreadNotifications->where('type','App\Notifications\subscriber')->count()}} {{trans('admin.Notifications')}}</li>--}}
                        <li>

                        </li>
                        {{--<li class="footer"><a href="#">View all</a></li>--}}
                    </ul>

                </li>
                <li class="dropdown notifications-menu">
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-flag-o"></i>--}}
{{--                        <span class="label label-warning count">{{auth()->guard('admin')->user()->unreadNotifications->where('type','App\Notifications\TransformExpired')->count()}}</span>--}}
{{--                    </a>--}}
                    <ul class="dropdown-menu">
{{--                        <li class="header">{{trans('admin.You_have')}} {{auth()->guard('admin')->user()->unreadNotifications->where('type','App\Notifications\TransformExpired')->count()}} {{trans('admin.Notifications')}}</li>--}}
                        <li>

                        </li>
                        {{--<li class="footer"><a href="#">View all</a></li>--}}
                    </ul>

                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-globe"></i>
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-6 text-center">
                                    <a href="{{url('lang/ar')}}">عربي</a>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <a href="{{url('lang/en')}}">English</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="@if(admin()->user()->image !== null){{asset('public/storage/'.admin()->user()->image)}}@else {{url('/')}}/adminlte/previewImage.png @endif" class="user-image" alt="green kinana admin image">
                        <span class="hidden-xs">{{admin()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="@if(admin()->user()->image !== null){{asset('public/storage/'.admin()->user()->image)}}@else {{url('/')}}/adminlte/previewImage.png @endif" class="img-circle" alt="green kinana admin image">

                            <p>
                                {{admin()->user()->name}}@if(admin()->user()->hasAnyRole(\Spatie\Permission\Models\Role::all())) -  {{admin()->user()->getRoleNames()[0]}}@endif
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                                <a href="{{url('/admin/logout')}}" class="btn btn-default btn-flat">{{trans('admin.Sign_out')}}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
