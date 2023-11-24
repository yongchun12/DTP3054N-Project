<!--Create Payroll Record-->
@extends('layouts.plugins')

@section('title', 'Create Attendance Record')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Attendance Record</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/attendance') }}">Attendance List</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active">Create Attendance Record</li>
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

                            <!--Header-->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa-solid fa-plus mr-1"></i>
                                    Create Attendance Record
                                </h3>
                            </div>

                            <!--Form-->
                            <form class="form-horizontal" method="post" accept="{{ url('') }}}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!--Employee Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Employee Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="employee_id" required>
                                                <option disabled selected value="">Select Employee Name</option>
                                                @foreach($getEmployee as $getE)
                                                    <option value="{{ $getE->id }}">{{ $getE->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Date-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Date
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="date" name="date"
                                                   class="form-control" required placeholder="Select Date">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="date_of_leave" class="col-sm-2 col-form-label">Punch In Time</label>
                                        <div class="col-sm-3">
                                            <input type="time" value="{{ old('time_in') }}" class="form-control" name="time_in" id="time_in" oninput="calculateTimes();" required>
                                        </div>

                                        <!--Difference Date-->
                                        <div class="col-sm-2 col-form-label" id="timesCount" style="text-align: center">
                                            0 Hours 0 Minutes
                                        </div>

                                        <label for="date_of_leave" class="col-sm-2 col-form-label" style="text-align: center">Punch Out Time</label>
                                        <div class="col-sm-3">
                                            <input type="time" value="{{ old('time_out') }}" class="form-control" name="time_out" id="time_out" oninput="calculateTimes();" required>
                                        </div>
                                    </div>


                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/attendance') }} " class="btn btn-default"><i class="fa-solid fa-xmark mr-1"></i>Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-plus mr-1"></i>Create Attendance Record</button>
                                    </div>

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
