<footer class="main-footer">
    <strong>Copyright &copy; 2018-2019 <a href="https://www.infosasics.com">infosas</a>.</strong> All rights
    reserved.
    <div class="pull-left hidden-xs">
        <b> Version</b> 1.0.4
    </div>

</footer>



<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js'></script>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
<!-- ./wrapper -->
<script src="{{url('/assets/js/custom.js')}}"></script>

<script src="{{url('/')}}/js/app.js?v=2.4.1"></script>
<!-- jQuery 3 -->
<script src="{{url('/')}}/icon.js"></script>
<script src="{{url('/')}}/main.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<script>
    window.trans = <?php
    // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
    $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
    $trans = [];
    foreach ($lang_files as $f) {
        $filename = pathinfo($f)['filename'];
        $trans[$filename] = trans($filename);
    }
    echo json_encode($trans);
    ?>;
</script>


<script src="{{url('/')}}/datatable.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/enum.js"></script>
<script src="{{url('/')}}/jstree/dist/jstree.js"></script>
@hasanyrole('admin|writer|meeting')
<script src="{{url('/')}}/js/dataTables.buttons.min.js"></script>
@endhasanyrole
<script src="{{url('/')}}/js/custom.js"></script>
<script src="{{asset('assets/js/select2.min.js')}}"></script>
@include('sweetalert::alert')


<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        rtl: true,
        language: '{{session('lang')}}',
        autoclose:true,
        todayBtn:true,
        clearBtn:true,
    });
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });


    $(".searchselect").select2({
        placeholder: "اختار ....",
        allowClear: true
    });


</script>


@stack('js')
@stack('css')
@can('edit')
    {{null}}
@else
    <style>
        .edit{
            /*display: none;*/
        }
    </style>
    <script>
        $(function () {
            'use strict'
            // $('.edit').remove();
        })
    </script>
@endcan
@can('delete')
    {{null}}
@else
    <style>
        .remove-record{
            /*display: none;*/
        }
    </style>
    <script>
        $(function () {
            'use strict'
            // $('.remove-record').remove();
        })
    </script>
@endcan
@can('create')
    {{null}}
@else
    <style>
        .create{
            /*display: none;*/
        }
    </style>
    <script>
        $(function () {
            'use strict'
            // $('.create').remove();
        })
    </script>
@endcan

<script>
    $(document).ready(function() {
//Preloader

        $(window).on("load", function() {
            preloaderFadeOutTime = 500;
            function hidePreloader() {
                var preloader = $('.spinner-wrapper');
                preloader.fadeOut(preloaderFadeOutTime);
            }
            hidePreloader();
        });
    });
</script>

</body>
</html>
