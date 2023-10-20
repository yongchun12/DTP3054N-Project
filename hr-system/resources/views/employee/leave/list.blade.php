<!--Leave Request-->
@extends('layouts.plugins')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Leave</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">

                        <!--Add Leave Request-->
                        <a href=" {{ url('employee/leave/create') }} " class="btn btn-primary"> Add Leave Request</a>

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Leave Request List-->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-md-12">

                        <!--Alert Message-->
                        @include('layouts.alert_message')

                    </section>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
