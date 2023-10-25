<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HR System | Dashboard</title>

    <!--Website Icon-->
    <link rel="icon" href="{{ asset('img/Project Logo.png/') }}">

    <!--/--------------External CSS File----------------/-->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

{{--    <!-- Font Awesome -->--}}
{{--    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">--}}

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

    <!--/--------------Must Link (With Folder)----------------/-->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!--/--------------CSS CDN Link----------------/-->

    <!--AdminLTE CSS CDN Link (Include with BootStrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!--Font Awesome Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

{{--    <!--Bootstrap CDN Link-->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('layouts.sidebar')

    <!--Content-->
        @yield('content')

    @include('layouts.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!--/control-sidebar -->
</div>
<!--/wrapper -->

<!--External JavaScript File-->
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

<!--/----------------Must Link----------------/-->
<!-- overlayScrollbars -->
<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

<!--/----------------CDN Link Javascript----------------/-->

<!--AdminLTE CDN Link JavaScript (Include with BootStrap)-->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!--HTML to PDF-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

<!--JQuery-->
{{--<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>--}}

{{--<!--BootStrap CDN Link Javascript-->--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>--}}

@yield('script')

</body>
</html>
