<!--Create Employees-->
@extends('layouts.plugins')

@section('title', 'View Attendance Record')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <i class="fa-regular fa-file-lines mr-1"></i>
                            View Attendance Record
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/attendance') }}">Attendance List</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active">View Attendance Record</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa-regular fa-file-lines mr-1"></i>
                                    View Attendance Record
                                </h3>
                            </div>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                <div class="card-body">

                                    <!--ID-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ID
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->id }}
                                        </div>
                                    </div>

                                    <!--Employee Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Employee Name
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            <!--If getRecord from the id is found then print the name if not then leave it out -->
                                            {{ !empty($getRecord->get_employee_name->name) ? $getRecord->get_employee_name->name : '' }}
                                        </div>
                                    </div>

                                    <!--Date-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ date('d F Y', strtotime($getRecord->date)) }}
                                        </div>
                                    </div>

                                    <!--Punch In Time-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Punch In Time
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ date('h:i:s A', strtotime($getRecord->time_in)) }}
                                        </div>
                                    </div>

                                    <!--Punch Out Time-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Punch Out Time
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ date('h:i:s A', strtotime($getRecord->time_out)) }}
                                        </div>
                                    </div>

                                    <!--Difference Time-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Duration
                                        </label>

                                        @php
                                            $time1 = new DateTime($getRecord->time_in);
                                            $time2 = new DateTime($getRecord->time_out);
                                            $interval = $time1->diff($time2);
                                        @endphp

                                        <div class="col-sm-10 col-form-label">
                                            {{ $interval->format('%h')." Hours ".$interval->format('%i')." Minutes" }}
                                        </div>
                                    </div>

                                </div>

                                <!--Card Footer-->
                                <div class="card-footer">
                                    <a href=" {{ url('admin/attendance') }} " class="btn btn-default"><i class="fa-solid fa-arrow-left mr-1"></i>Back</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
