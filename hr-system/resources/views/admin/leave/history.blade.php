<!--Table List Employees-->
@extends('layouts.plugins')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Leave History</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Leave History List-->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-lg-12">

                        <!--Alert Message-->
                        @include('layouts.alert_message')

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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Leave Category</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($getHistory as $data)
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                {{ $data->id }}
                                            </td>

                                            <td style="vertical-align: middle;">
                                                {{ $data->name }}
                                            </td>

                                            <td style="vertical-align: middle;">
                                                {{ date('d-m-Y', strtotime($data->from_leaveDate)) }}
                                            </td>

                                            <td style="vertical-align: middle;">
                                                {{ date('d-m-Y', strtotime($data->to_leaveDate)) }}
                                            </td>

                                            <td style="vertical-align: middle;">
                                                @if($data->type_of_leave == 0)
                                                    Unpaid Leave
                                                @elseif($data->type_of_leave == 1)
                                                    Annual Leave
                                                @elseif($data->type_of_leave == 2)
                                                    Medical Leave
                                                @endif
                                            </td>

                                            <td style="vertical-align: middle;">
                                                @if($data->leave_status == 0)
                                                    Pending
                                                @elseif($data->leave_status == 1)
                                                    Approved
                                                @elseif($data->leave_status == 2)
                                                    Rejected
                                                @endif
                                            </td>

                                            <td style="vertical-align: middle;">
                                                {{ date('d-F-Y h:i A', strtotime($data->created_at)) }}
                                            </td>

                                            <td style="vertical-align: middle;">
                                                {{ date('d-F-Y h:i A', strtotime($data->updated_at)) }}
                                            </td>

                                            <td style="vertical-align: middle;">
                                                <a href="{{ url('admin/leave/history/view/' .$data->id) }}" class="btn btn-primary">View</a>
                                                <a href="{{ url('admin/leave/history/delete/' .$data->id) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" style="text-align: center">No Record Found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>

                                </table>

                                <!--Pagination-->
                                <div style="padding: 10px; float: right;">
                                    {!! $getHistory->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
