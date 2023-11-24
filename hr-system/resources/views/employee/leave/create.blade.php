<!--Leave Request-->
@extends('layouts.plugins')

@section('title', 'Create Leave Request')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Requesting Leave</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Leave Request-->
        <section class="content">
            <div class="container-fluid">

                <!--Alert Message-->
                @include('layouts.alert_message')

                <div class="row">
                    <section class="col-md-12">

                        <div class="card card-primary">

                            <!--Header-->
                            <div class="card-header">
                                <h3 class="card-title">Request for Leave</h3>
                            </div>

                                <form class="form-horizontal" method="post" accept="{{ url('') }}}" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="card-body">

                                    <!--Type of Leave-->
                                    <div class="form-group row">
                                        <label for="type_of_leave" class="col-sm-2 col-form-label">Type of Leave</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name = "type_of_leave" id="type_of_leave" aria-label="Default select example" required>
                                                <option disabled>Select a leave type</option>
                                                <option value="0">Unpaid Leave</option>
                                                <option value="1">Annual Leave</option>
                                                <option value="2">Medical Leave</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!--Description-->
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">

                                            <textarea class="form-control" name="description" id="description" placeholder="Enter the description" required></textarea>

                                        </div>
                                    </div>

                                        <!--If want apply for one day leave, just put the same day, if want two days or above then put two different days-->
                                    <!--Durations of Leave-->
                                    <div class="form-group row">
                                        <label for="date_of_leave" class="col-sm-2 col-form-label">From Date</label>
                                        <div class="col-sm-3">
                                            <input type="date" value="{{ old('from_leaveDate') }}" class="form-control" id="from_leaveDate" name="from_leaveDate" oninput="dateDifference(); updateToDateMin();" required>
                                        </div>

                                        <!--Difference Date-->
                                        <div class="col-sm-2 col-form-label" id="dayCount" style="text-align: center">
                                            0 Days
                                        </div>

                                        <label for="date_of_leave" class="col-sm-2 col-form-label" style="text-align: center">To Date: </label>
                                        <div class="col-sm-3">
                                            <input type="date" value="{{ old('to_leaveDate') }}" class="form-control" id="to_leaveDate" name="to_leaveDate" oninput="dateDifference(); updateToDateMax();" required>
                                        </div>
                                    </div>

                                    <!--Button Submit-->

                                    <div class="card-footer">
                                        <a href=" {{ url('employee/leave') }} " class="btn btn-default">Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right">Submit Leave Request</button>
                                    </div>

                                    </div>
                                </form>
                                </div>
                    </section>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
