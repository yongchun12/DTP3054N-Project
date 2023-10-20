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

                <div class="row">
                    <section class="col-md-12">

                        <div class="card card-info">

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
                                                <option selected disabled>Select a leave type</option>
                                                <option value="0">Unpaid Leave</option>
                                                <option value="1">Normal Leave</option>
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

                                    <!--Date of Leave-->
                                    <div class="form-group row">
                                        <label for="date_of_leave" class="col-sm-2 col-form-label">Date of Leave</label>
                                        <div class="col-sm-10">
                                            <input type="date" value="{{ old('date_of_leave') }}" class="form-control" id="date_of_leave" name="date_of_leave" required>
                                        </div>
                                    </div>

                                    <!--Button Submit-->
{{--                                    <div class="form-group row">--}}
{{--                                        <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>--}}
{{--                                        <div class="col-sm-10">--}}
{{--                                            <input class="btn btn-primary col-md-2 col-sm-12" value="Submit" id="button" type="submit">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

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
