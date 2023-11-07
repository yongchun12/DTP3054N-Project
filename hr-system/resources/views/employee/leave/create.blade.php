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

                                            <textarea class="form-control" name="description" id="description" placeholder="Enter the description" oninput="dateDifference()" required></textarea>

                                        </div>
                                    </div>

                                    <!--Durations of Leave-->
                                    <div class="form-group row">
                                        <label for="date_of_leave" class="col-sm-2 col-form-label">From Date</label>
                                        <div class="col-sm-3">
                                            <input type="date" value="{{ old('from_leaveDate') }}" class="form-control" id="from_leaveDate" name="from_leaveDate" required>
                                        </div>

                                        <!--Difference Date-->
                                        <div class="col-sm-2 col-form-label" id="dayCount" style="text-align: center">
                                            0 Days
                                        </div>

                                        <label for="date_of_leave" class="col-sm-2 col-form-label" style="text-align: center">To Date: </label>
                                        <div class="col-sm-3">
                                            <input type="date" value="{{ old('to_leaveDate') }}" class="form-control" id="to_leaveDate" name="to_leaveDate" oninput="dateDifference()" required>
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

    <!--JavaScript-->
    <script>
        function dateDifference() {
            const firstDate = document.getElementById('from_leaveDate').value;
            const secondDate = document.getElementById('to_leaveDate').value;

            const startTimestamp = Date.parse(firstDate);
            const endTimestamp = Date.parse(secondDate);

            const difference = endTimestamp - startTimestamp;

            const daysDifference = Math.round(difference / (1000 * 60 * 60 * 24));

            const dayCountComponent = document.getElementById('dayCount');
            dayCountComponent.innerHTML = daysDifference + " Days";
        }
    </script>

@endsection
