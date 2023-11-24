<!--Leave Request-->
@extends('layouts.plugins')

@section('title', 'Leave Application')

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
                        <a href=" {{ url('employee/leave/create') }} " class="btn btn-primary">
                            <i class="fa-solid fa-plus mr-1"></i>
                            Add Leave Request
                        </a>

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
                                    <i class="nav-icon fa fa-calendar-alt mr-1"></i>
                                    Leave Record
                                </h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">

                                    <thead>
                                    <!--tr is Table Row-->
                                    <tr style="text-align: center">
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Duration</th>
                                        <th>Leave Category</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Reason</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <!--Calculate that Employee take how many Leave already-->
                                    @php
                                        $totalLeaveDays = 0;
                                    @endphp


                                    @forelse($getOwnLeaveRecord as $data)
                                        <tr style="vertical-align: middle; text-align: center;">
                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ date('d-m-Y', strtotime($data->from_leaveDate)) }}
                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ date('d-m-Y', strtotime($data->to_leaveDate)) }}
                                            </td>

                                            <!--Duration-->
                                            @php
                                                $from = \Carbon\Carbon::parse($data->from_leaveDate);
                                                $to = \Carbon\Carbon::parse($data->to_leaveDate);
                                                // Calculate the duration including the end date
                                                $duration = $from->diffInWeekdays($to);

                                                // Check if the end date is a weekday to include it in the count
                                                if ($to->isWeekday()) {
                                                    $duration += 1;
                                                }

                                                $totalLeaveDays += $duration;
                                            @endphp

                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ $duration }} Days
                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">
                                                @if($data->type_of_leave == 0)
                                                    Unpaid Leave
                                                @elseif($data->type_of_leave == 1)
                                                    Annual Leave
                                                @elseif($data->type_of_leave == 2)
                                                    Medical Leave
                                                @endif
                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">

                                                    <!--Pending-->
                                                @if($data->leave_status == 0)
                                                    <span class="badge bg-primary" style="font-size: 14px">
                                                        Pending
                                                    </span>

                                                    <!--Approved-->
                                                @elseif($data->leave_status == 1)
                                                    <span class="badge bg-success" style="font-size: 14px">
                                                        Approved
                                                    </span>

                                                    <!--Rejected-->
                                                @elseif($data->leave_status == 2)
                                                    <span class="badge bg-danger" style="font-size: 14px">
                                                        Rejected
                                                    </span>
                                                @endif

                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ date('d-F-Y h:i A', strtotime($data->created_at)) }}
                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ date('d-F-Y h:i A', strtotime($data->updated_at)) }}
                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">
                                                @if(!empty($data->reject_reason))
                                                    <i class="fa fa-check"></i>
                                                @else
                                                    <i class="fa fa-times"></i>
                                                @endif
                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">
                                                <a href="{{ url('employee/leave/view/'.$data->id) }}" class="btn btn-outline-primary">
                                                    <i class="fa-regular fa-file-lines mr-1"></i>
                                                    View
                                                </a>

                                                <!--If the leave status is Approved or Rejected, the delete button will be disabled-->
                                                @if($data->leave_status == 1 || $data->leave_status == 2)
                                                    <a onclick="return alert('You are not allowed to delete Approved / Rejected Application.')" class="btn btn-outline-danger" style="margin-left: 10px;">
                                                        <i class="fa-regular fa-trash-can mr-1"></i>
                                                        Delete
                                                    </a>
                                                @else
                                                    <a href="{{ url('employee/leave/delete/'.$data->id) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-outline-danger" style="margin-left: 10px;">
                                                        <i class="fa-regular fa-trash-can mr-1"></i>
                                                        Delete
                                                    </a>
                                                @endif
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" style="text-align: center">No Record Found</td>
                                        </tr>
                                    @endforelse

                                    <tr>
                                        <th style="vertical-align: middle; text-align: center;">Total</th>
                                        <td></td>
                                        <td style="vertical-align: middle; text-align: center;">{{ $totalLeaveDays }} Days</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

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
