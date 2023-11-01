<!-- Preloader Animation -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('img/Project Logo.png') }}" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" href=" {{ url('logout') }} ">
                <i class="fas fa-sign-out-alt"></i>
            </a>

        </li>

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <!--Logo-->
        <!--Remember Change to white-->
        <img src="{{ asset('img/Project Logo.png') }}" alt="HR System Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8">
        <span class="brand-text font-weight-light">HR System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <!--Profile Picture-->
            <div class="image">
                @if(Auth::user()->profile_picture)
                        <img src="{{ asset('img/profile_picture/'.Auth::user()->profile_picture) }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>

            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <!--Admin Dashboard-->
                @if(Auth::user()->is_role == '1')

                <li class="nav-item">
                    <a href=" {{ url('admin/dashboard') }} " class="nav-link
                    @if(Request::segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fa fa-home"></i>
                        <!--Segment means the link director if (1) it will active by /admin link if (2) will detect dashboard-->
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href=" {{ url('admin/employees') }} " class="nav-link
                    @if(Request::segment(2) == 'employees') active @endif">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Employees
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href=" {{ url('admin/payroll') }} " class="nav-link
                    @if(Request::segment(2) == 'payroll') active @endif">
                        <i class="nav-icon fa fa-money-bill"></i>
                        <p>
                            Payroll
                        </p>
                    </a>
                </li>

                    <li class="nav-item">
                        <a href=" {{ url('admin/leave/pending') }} " class="nav-link
                           @if(Request::segment(3) == 'pending') active @endif">
                        <i class="nav-icon fa fa-calendar-alt"></i>
                        <p>
                            Leave
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href=" {{ url('admin/leave/history') }} " class="nav-link
                           @if(Request::segment(3) == 'history') active @endif">
                            <i class="nav-icon fa fa-calendar-alt"></i>
                            <p>
                                Leave History
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href=" {{ url('admin/forum') }} " class="nav-link
                           @if(Request::segment(2) == 'forum') active @endif">
                            <i class="nav-icon fa fa-comment"></i>
                            <p>
                                Forum
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href=" {{ url('admin/my_account') }} " class="nav-link
                    @if(Request::segment(2) == 'my_account') active @endif">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                My Account
                            </p>
                        </a>
                    </li>

{{--                <li class="nav-item">--}}
{{--                    <a href=" {{ url('admin/departments') }} " class="nav-link">--}}
{{--                        <i class="nav-icon fa fa-building"></i>--}}
{{--                        <p>--}}
{{--                            Department--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a href=" {{ url('admin/countries') }} " class="nav-link">--}}
{{--                        <i class="nav-icon fa fa-flag"></i>--}}
{{--                        <p>--}}
{{--                            Countries--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a href=" {{ url('admin/locations') }} " class="nav-link">--}}
{{--                        <i class="nav-icon fa fa-map-marked-alt"></i>--}}
{{--                        <p>--}}
{{--                            Locations--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a href=" {{ url('admin/regions') }} " class="nav-link">--}}
{{--                        <i class="nav-icon fa fa-asterisk"></i>--}}
{{--                        <p>--}}
{{--                            Regions--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

                @endif

                <!--Employee Dashboard-->
                @if(Auth::user()->is_role == '0')

                    <li class="nav-item">
                        <a href=" {{ url('employee/dashboard') }} " class="nav-link
                    @if(Request::segment(2) == 'dashboard') active @endif">
                            <i class="nav-icon fa fa-home"></i>
                            <!--Segment means the link director if (1) it will active by /admin link if (2) will detect dashboard-->
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href=" {{ url('employee/payroll') }} " class="nav-link
                    @if(Request::segment(2) == 'payroll') active @endif">
                            <i class="nav-icon fa fa-money-bill"></i>
                            <p>
                                Payroll
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href=" {{ url('employee/leave') }} " class="nav-link
                           @if(Request::segment(2) == 'leave') active @endif">
                        <i class="nav-icon fa fa-calendar-alt"></i>
                        <p>
                            Leave
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href=" {{ url('employee/my_account') }} " class="nav-link
                    @if(Request::segment(2) == 'my_account') active @endif">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                My Account
                            </p>
                        </a>
                    </li>

                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
