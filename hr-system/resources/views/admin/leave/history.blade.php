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

                        <div class="card card-outline card-primary">
                            <div class="card-header">

                                <h3 class="card-title">
                                    <i class="fa-solid fa-magnifying-glass mr-1"></i>
                                    Search Leave Record
                                </h3>

                            </div>

                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <!--ID-->
                                        <div class="form-group col-md-1">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" placeholder="Enter ID" value="{{ Request()->id }}">
                                        </div>

                                        <!--Employee Name-->
                                        <div class="form-group col-md-3">
                                            <label>Employee Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Employee Name" value="{{ Request()->employee_id }}">
                                        </div>

                                        <!--From-->
                                        <div class="form-group col-md-3">
                                            <label>From Date</label>
                                            <input type="date" name="from_leaveDate" class="form-control" placeholder="Enter Number of Day Work" value="{{ Request()->from_leaveDate }}">
                                        </div>

                                        <!--To-->
                                        <div class="form-group col-md-3">
                                            <label>To Date</label>
                                            <input type="date" name="to_leaveDate" class="form-control" placeholder="Enter Number of Day Work" value="{{ Request()->to_leaveDate }}">
                                        </div>

                                        <!--Button-->
                                        <div class="form-group col-md-2">
                                            <!--Search Button-->
                                            <button class="btn btn-primary" type="submit" style="margin-top: 32px">
                                                <i class="fa-solid fa-magnifying-glass mr-1"></i>
                                                Search
                                            </button>

                                            <!--Reset Button-->
                                            <a href="{{ url('admin/leave/history') }}">
                                                <button class="btn btn-secondary" style="margin-top: 32px; margin-left: 5px;">
                                                    <i class="fa-solid fa-rotate"></i>
                                                    Reset
                                                </button>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="card">
                            <!--Title-->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa-solid fa-list mr-1"></i>
                                    Leave Record
                                </h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">

                                    <thead>
                                    <!--tr is Table Row-->
                                    <tr>
                                        <th style="text-align: center">ID</th>
                                        <th style="text-align: center">Name</th>
                                        <th style="text-align: center">From</th>
                                        <th style="text-align: center">To</th>
                                        <th style="text-align: center">Duration</th>
                                        <th style="text-align: center">Leave Category</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <!--Calculate that Employee take how many Leave already-->
                                    @php
                                        $totalLeaveDays = 0;
                                    @endphp

                                    @forelse($getHistory as $data)
                                        <tr style="vertical-align: middle; text-align: center;">
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

                                                    echo $duration, " Days";
                                                @endphp
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
                                                    <span class="badge bg-primary" style="font-size: 14px">
                                                        Pending
                                                    </span>
                                                @elseif($data->leave_status == 1)
                                                    <span class="badge bg-success" style="font-size: 14px">
                                                        Approved
                                                    </span>
                                                @elseif($data->leave_status == 2)
                                                    <span class="badge bg-danger" style="font-size: 14px">
                                                        Rejected
                                                    </span>
                                                @endif
                                            </td>

                                            <td style="vertical-align: middle;">

                                                <!--View Button-->
                                                <a href="{{ url('admin/leave/history/view/' .$data->id) }}" class="btn btn-outline-primary">
                                                    <i class="fa-regular fa-file-lines mr-1"></i>
                                                    View
                                                </a>

                                                <!--Delete Button-->
                                                <a href="{{ url('admin/leave/history/delete/' .$data->id) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-outline-danger" style="margin-left: 10px;">
                                                    <i class="fa-regular fa-trash-can mr-1"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" style="text-align: center">No Record Found</td>
                                        </tr>
                                    @endforelse

                                    <tr style="text-align: center">
                                        <th style="text-align: center">Total</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $totalLeaveDays }} Days</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

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
