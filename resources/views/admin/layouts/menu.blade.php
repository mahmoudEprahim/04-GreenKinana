
<aside class="main-sidebar" id="mySidenav">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="@if(admin()->user()->image !== null){{asset('public/storage/'.admin()->user()->image)}}@else {{url('/')}}/adminlte/previewImage.png @endif"  style="height: 45px !important;" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{admin()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{trans('admin.Online')}}</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
           
            <li class="treeview {{ active_menu('dashboard')[1]  }} ">
            <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{trans('admin.Dashboard')}}</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu" style="{{ active_menu('dashboard')[1]  }}">
                    <li class="active"><a href="{{url('admin/dashboard')}}"><i class="fa fa-circle-o"></i> {{trans('admin.Dashboard')}}</a></li>
                    
                </ul>
            </li>
            <!-- contact us -->

            <li class="treeview {{ active_menu('sliders')[1]  }} ">
                <a href="#">
                    <i class="fa fa-image"></i> <span>{{trans('admin.sliders')}}</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu" style="{{ active_menu('sliders')[1]  }}">
                    <li class="active"><a href="{{url('admin/sliders')}}"><i class="fa fa-circle-o"></i> {{trans('admin.sliders')}}</a></li>
                   
                </ul>
            </li>


            <li class="treeview {{ active_menu('contact-us')[1]  }} ">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>{{trans('admin.contact-us')}}</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu" style="{{ active_menu('contact-us')[1]  }}">
                    <li class="active"><a href="{{url('admin/messages')}}"><i class="fa fa-circle-o"></i> {{trans('admin.contact-us')}}</a></li>
                   
                </ul>
            </li>
            <!-- category -->
            <!-- <li class="treeview {{ active_menu('category')[1]  }} ">
                <a href="#">
                    <i class="fa fa-list-alt"></i> <span>{{trans('admin.category')}}</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu" style="{{ active_menu('category')[1]  }}">
                    <li class="active"><a href="{{url('admin/categories')}}"><i class="fa fa-circle-o"></i> {{trans('admin.categories')}}</a></li>
                   
                </ul>
            </li> -->
            <!-- videos -->
            <li class="treeview {{ active_menu('videos')[1]  }} ">
                <a href="#">
                    <i class="fa fa-video-camera"></i> <span>{{trans('admin.videos')}}</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu" style="{{ active_menu('videos')[1]  }}">
                    <li class="active"><a href="{{url('admin/videos')}}"><i class="fa fa-circle-o"></i> {{trans('admin.videos')}}</a></li>
                   
                </ul>
            </li>
            <!-- images -->
            <li class="treeview {{ active_menu('images')[1]  }} ">
                <a href="#">
                    <i class="fa fa-image"></i> <span>{{trans('admin.images')}}</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu" style="{{ active_menu('images')[1]  }}">
                    <li class="active"><a href="{{url('admin/images')}}"><i class="fa fa-circle-o"></i> {{trans('admin.images')}}</a></li>
                   
                </ul>
            </li>
            <li class="treeview {{ active_menu('services')[1]  }} ">
                <a href="#">
                    <i class="fa fa-briefcase"></i> <span>{{trans('admin.services')}}</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu" style="{{ active_menu('services')[1]  }}">
                    <li class="active"><a href="{{url('admin/services')}}"><i class="fa fa-circle-o"></i> {{trans('admin.services')}}</a></li>
                   
                </ul>
            </li>
            <li class="treeview {{ active_menu('orders')[1]  }} ">
                <a href="#">
                    <i class="fa fa-briefcase"></i> <span>{{trans('admin.orders')}}</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu" style="{{ active_menu('orders')[1]  }}">
                    <li class="active"><a href="{{url('admin/orders')}}"><i class="fa fa-circle-o"></i> {{trans('admin.orders')}}</a></li>
                   
                </ul>
            </li>



                @hasrole('admin')
                <li class="treeview {{ active_menu('admins')[0]  }} {{ active_menu('permissions')[0]  }} {{ active_menu('roles')[0]  }}">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>{{trans('admin.Admin_Account')}}</span>
                        <span class="pull-right-container"></span>
                    </a>
                    <ul class="treeview-menu" style="{{ active_menu('admins')[1]  }} {{ active_menu('permissions')[1]  }} {{ active_menu('roles')[1]  }}">
                        <li class="active"><a href="{{url('/admin/admins')}}"><i class="fa fa-circle-o"></i>{{trans('admin.Admin_Account')}} </a></li>
                        <li><a href="{{url('/admin/permissions')}}"><i class="fa fa-circle-o"></i>{{trans('admin.permission')}} </a></li>
                        <li><a href="{{url('/admin/roles')}}"><i class="fa fa-circle-o"></i>{{trans('admin.Roles')}} </a></li>
                    </ul>
                </li>
                @endhasrole

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
