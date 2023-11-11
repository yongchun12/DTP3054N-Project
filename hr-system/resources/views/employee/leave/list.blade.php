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

                        <!--Table-->
                        <div class="card">
                            <!--Title-->
                            <div class="card-header">
                                <h3 class="card-title">Leave Record</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">

                                    <thead>
                                    <!--tr is Table Row-->
                                    <tr>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Leave Category</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($getOwnLeaveRecord as $data)
                                        <tr>
                                            <td>{{ date('d-m-Y', strtotime($data->from_leaveDate)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($data->to_leaveDate)) }}</td>
                                            <td>
                                                @if($data->type_of_leave == 0)
                                                    Unpaid Leave
                                                @elseif($data->type_of_leave == 1)
                                                    Annual Leave
                                                @elseif($data->type_of_leave == 2)
                                                    Medical Leave
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->leave_status == 0)
                                                    Pending
                                                @elseif($data->leave_status == 1)
                                                    Approved
                                                @elseif($data->leave_status == 2)
                                                    Rejected
                                                @endif
                                            </td>
                                            <td>{{ date('d-F-Y h:i A', strtotime($data->created_at)) }}</td>
                                            <td>{{ date('d-F-Y h:i A', strtotime($data->updated_at)) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" style="text-align: center">No Record Found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>

                                </table>

                                <div style="padding: 10px; float: right;">
                                    {!! $getOwnLeaveRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
