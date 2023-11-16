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

<!--/----------------CDN Link Javascript----------------/-->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<!--AdminLTE CDN Link JavaScript (Include with BootStrap)-->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!--HTML to PDF-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

<!--/----------------UnLink Yet----------------/-->

@yield('script')

</body>
</html>
