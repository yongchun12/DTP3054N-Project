<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Title-->
    <title>HR System | Dashboard</title>

    <!--Website Icon-->
    <link rel="icon" href="{{ asset('img/Project Logo.png/') }}">

    <!--/--------------External CSS File----------------/-->

    <!--/--------------Must Link (From Public File)----------------/-->

    <!--/--------------CSS CDN Link----------------/-->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!--AdminLTE CSS CDN Link (Include with BootStrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!--Font Awesome Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--Unlink Yet-->
    {{--    <!-- iCheck -->--}}
    {{--    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">--}}

    {{--    <!-- JQVMap -->--}}
    {{--    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">--}}

    {{--    <!-- Daterange picker -->--}}
    {{--    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">--}}

    {{--    <!-- Tempusdominus Bootstrap 4-->--}}
    {{--    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">--}}

    {{--    <!-- summernote -->--}}
    {{--    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">--}}

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.sidebar')

    <!--Content-->
        @yield('content')

    <!--Footer-->
    @include('layouts.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!--/control-sidebar -->
</div>
<!--/wrapper -->

<!--External JavaScript File-->

<!--JavaScript Resource File-->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

<!--/----------------Must Link (From Public File)----------------/-->
<!-- overlayScrollbars -->
{{--<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>--}}

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<!--/----------------CDN Link Javascript----------------/-->

<!--AdminLTE CDN Link JavaScript (Include with BootStrap)-->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!--HTML to PDF-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>


<!--/----------------UnLink Yet----------------/-->
{{--<!-- jQuery UI 1.11.4 -->--}}
{{--<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}'"></script>--}}

{{--<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->--}}
{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button)--}}
{{--</script>--}}

{{--<!-- Bootstrap 4 -->--}}
{{--<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}

{{--<!-- ChartJS -->--}}
{{--<script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>--}}

{{--<!-- Sparkline -->--}}
{{--<script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>--}}

{{--<!-- JQVMap -->--}}
{{--<script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>--}}
{{--<script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>--}}

{{--<!-- jQuery Knob Chart -->--}}
{{--<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>--}}

{{--<!-- daterangepicker -->--}}
{{--<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>--}}

{{--<!-- Tempusdominus Bootstrap 4 -->--}}
{{--<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>--}}

{{--<!-- Summernote -->--}}
{{--<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>--}}

@yield('script')

</body>
</html>
