<!--Attendance list-->
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
                        <h1>Attendance List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
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

                        <!--Table-->
                        <div class="card card-outline card-primary">
                            <!--Title-->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class=" nav-icon fa-solid fa-user-clock"></i>
                                    History Attendance List
                                </h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">

                                    <thead>
                                    <!--HEADER-->
                                        <tr style="text-align: center">
                                            <th>ID</th>
                                            <th>Attendance Date</th>
                                            <th>Punch In</th>
                                            <th>Punch Out</th>
                                            <th>Duration</th>
                                        </tr>
                                    </thead>

                                    <!--Data-->
                                    <tbody style="vertical-align: middle; text-align: center;">
                                    @forelse($attendanceList as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ date('d-M-Y', strtotime($data->date)) }}</td>
                                            <td>{{ date('h:i:s A', strtotime($data->time_in)) }}</td>

                                            <!--Time Out / Punch Out-->
                                            @if(!empty($data->time_out))
                                                <td>{{ date('h:i:s A', strtotime($data->time_out)) }}</td>
                                            @else
                                                <td>Didn't Punch Out Yet</td>
                                            @endif

                                            <td>
                                                @php
                                                    $time1 = new DateTime($data->time_in);
                                                    $time2 = new DateTime($data->time_out);
                                                    $interval = $time1->diff($time2);
                                                @endphp

                                                {{ $interval->format('%h')." Hours ".$interval->format('%i')." Minutes" }}
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
