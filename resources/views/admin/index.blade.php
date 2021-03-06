@include('admin.layouts.header')

@include('admin.layouts.navbar')
<div class="wrapper" id="app">
    @include('admin.layouts.menu')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
                <small>{{trans('admin.Control_panel')}}</small>
            </h1>
            <ol class="breadcrumb">
            <li><a href="@yield('root_link', route('admin.home'))"><i class="fa fa-dashboard"></i> @yield('root_name', trans('admin.Home'))</a></li>
                <li class="active">@yield('title')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            @yield('content')
        </section>



    </div>
</div>
@include('admin.layouts.footer')
