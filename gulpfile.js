var gulp = require('gulp');
var concat = require('gulp-concat');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('css',function () {
    gulp.src(['public/css/dropzone.min.css','public/adminlte/dist/css/skins/_all-skins.min.css','public/adminlte/bower_components/morris.js/morris.css',
        'public/adminlte/bower_components/jvectormap/jquery-jvectormap.css','public/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css','public/css/buttons.dataTables.min.css',
        'public/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css','public/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'public/css/select2.min.css','public/css/style.css'])
        .pipe(concat('main.css'))
        .pipe(gulp.dest('public'))
});
gulp.task('datatable',function () {
    gulp.src(['public/css/buttons.dataTables.min.css','public/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'])
        .pipe(concat('datatable.css'))
        .pipe(gulp.dest('public'))
});

gulp.task('js',function () {
   gulp.src(['public/adminlte/bower_components/jquery/dist/jquery.min.js','public/adminlte/bower_components/jquery-ui/jquery-ui.min.js','public/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js','public/adminlte/bower_components/raphael/raphael.min.js',
   'public/adminlte/bower_components/morris.js/morris.min.js','public/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
   'public/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js','public/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
   'public/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js','public/adminlte/bower_components/moment/min/moment.min.js',
   'public/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js','public/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
   'public/js/bootstrap-datepicker.ar.min.js','public/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
   'public/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js','public/adminlte/bower_components/fastclick/lib/fastclick.js',
   'public/adminlte/dist/js/adminlte.min.js','public/js/select2.full.min.js','public/adminlte/dist/js/pages/dashboard.js',
   'public/adminlte/dist/js/demo.js',
   'public/js/jquery.validate.min.js','public/js/additional-methods.min.js','public/js/messages_ar.min.js','public/js/dropzone.min.js'])
       .pipe(concat('main.js'))
       .pipe(gulp.dest('public'))
});
gulp.task('datatablejs',function () {
   gulp.src(['public/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js','public/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js',
   'public/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js','public/vendor/datatables/buttons.server-side.js'])
       .pipe(concat('datatable.js'))
       .pipe(gulp.dest('public'))
});
