<!--Table List Employees-->
@extends('layouts.plugins')

@section('title', 'Attendance List')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <i class="nav-icon fa-solid fa-user-clock mr-2"></i>
                            Attendance List
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">

                        <!--Excel Export-->
                        <a href="{{ url('admin/attendance_export') }}" class="btn btn-success">
                            <i class="fa-regular fa-file-excel mr-1"></i>
                            Excel Export
                        </a>

                        <!--Add Attendance Record-->
                        <a href=" {{ url('admin/attendance/create') }} " class="btn btn-primary" style="margin-left: 5px;">
                            <i class="fa-solid fa-plus mr-1"></i>
                            Add Attendance Record
                        </a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Payroll List-->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-md-12">

                        <!--Alert Message-->
                        @include('layouts.alert_message')

                        <!--Search Function-->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa-solid fa-magnifying-glass mr-1"></i>
                                    Search Attendance Record
                                </h3>
                            </div>

                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <!--Employee Name-->
                                        <div class="form-group col-md-3">
                                            <label>Employee Name</label>
                                            <input type="text" name="employee_id" class="form-control" placeholder="Enter Employee Name" value="{{ Request()->employee_id }}">
                                        </div>

                                        <!--Number of Day Work-->
                                        <div class="form-group col-md-3">
                                            <label>Date</label>
                                            <input type="date" name="date" class="form-control" placeholder="Select Date" value="{{ Request()->date }}">
                                        </div>

                                        <!--Button-->
                                        <div class="form-group col-md-3">
                                            <!--Search Button-->
                                            <button class="btn btn-primary" type="submit" style="margin-top: 32px">
                                                <i class="fa-solid fa-magnifying-glass mr-1"></i>
                                                Search
                                            </button>

                                            <!--Reset Button-->
                                            <a href="{{ url('admin/attendance') }}">
                                                <button class="btn btn-secondary" style="margin-top: 32px; margin-left: 5px;" type="button">
                                                    <i class="fa-solid fa-rotate"></i>
                                                    Reset
                                                </button>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>

                        <!--Table-->
                        <div class="card card-outline card-primary">
                            <!--Title-->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class=" nav-icon fa-solid fa-user-clock mr-1"></i>
                                    Attendance List
                                </h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">

                                    <thead>
                                    <!--HEADER-->
                                    <tr style="text-align: center">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Attendance Date</th>
                                        <th>Punch In</th>
                                        <th>Punch Out</th>
                                        <th>Duration</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <!--Data-->
                                    <tbody style="vertical-align: middle; text-align: center;">
                                    @forelse($attendanceList as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ date('d-M-Y', strtotime($data->date)) }}</td>
                                            <td>{{ date('h:i:s A', strtotime($data->time_in)) }}</td>
                                            <!--Time Out / Punch Out-->
                                            @if(!empty($data->time_out))
                                                <td>{{ date('h:i:s A', strtotime($data->time_out)) }}</td>
                                            @else
                                                <td>Didn't Punch Out Yet</td>
                                            @endif

                                            <!--Duration-->
                                            <td>
                                                @php
                                                    $time1 = new DateTime($data->time_in);
                                                    $time2 = new DateTime($data->time_out);
                                                    $interval = $time1->diff($time2);
                                                @endphp

                                                {{ $interval->format('%h')." Hours ".$interval->format('%i')." Minutes" }}
                                            </td>

                                            <!--Action Button-->
                                            <td>
                                                <!--View Button-->
                                                <a href="{{ url('admin/attendance/view/'.$data->id) }}" class="btn btn-outline-primary">
                                                    <i class="fa-regular fa-file-lines mr-1"></i>
                                                    View
                                                </a>

                                                <!--Edit Button-->
                                                <a href="{{ url('admin/attendance/edit/'.$data->id) }}" class="btn btn-outline-secondary" style="margin-left: 5px;">
                                                    <i class="fa-regular fa-pen-to-square mr-1"></i>
                                                    Edit
                                                </a>

                                                <!--Delete Button-->
                                                <a href="{{ url('admin/attendance/delete/'.$data->id) }}" onclick="return confirm('Are you sure want to delete?')"
                                                   class="btn btn-outline-danger" style="margin-left: 5px;">
                                                    <i class="fa-regular fa-trash-can mr-1"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="100%" style="text-align: center">No Attendance Record Found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>

                                </table>

                                <div style="padding: 10px; float: right;">
                                    {!! $attendanceList->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>

                            </div>
                        </div>

                    </section>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
