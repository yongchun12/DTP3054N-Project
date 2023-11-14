<!--Create Employees-->
@extends('layouts.plugins')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Leave Record</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/leave/history') }}">Leave History</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active"><a href="#">View</a></li>
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

                        <div class="card card-info">

                            <!--Card Header-->
                            <div class="card-header">
                                <h3 class="card-title">View Leave Record</h3>
                            </div>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                <div class="card-body">

                                    <!--Staff ID-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Staff Name</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->name }}
                                        </div>
                                    </div>

                                    <!--Type of Leave-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Type of Leave</label>

                                        <div class="col-sm-10 col-form-label">
                                            @if($getRecord->type_of_leave == 0)
                                                Unpaid Leave
                                            @elseif($getRecord->type_of_leave == 1)
                                                Annual Leave
                                            @elseif($getRecord->type_of_leave == 2)
                                                Medical Leave
                                            @endif
                                        </div>
                                    </div>

                                    <!--Description-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Leave Description</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->description }}
                                        </div>
                                    </div>

                                    <!--From Leave Date-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">From</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ date('d F Y', strtotime($getRecord->from_leaveDate)) }}
                                        </div>
                                    </div>

                                    <!--To Leave Date-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">To</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ date('d F Y', strtotime($getRecord->to_leaveDate)) }}
                                        </div>
                                    </div>

                                    <!--Duration-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Duration</label>

                                        <div class="col-sm-10 col-form-label" id="duration">

                                            @php
                                                $from = \Carbon\Carbon::parse($getRecord->from_leaveDate);
                                                $to = \Carbon\Carbon::parse($getRecord->to_leaveDate);
                                                // Calculate the duration including the end date
                                                $duration = $from->diffInWeekdays($to);

                                                // Check if the end date is a weekday to include it in the count
                                                if ($to->isWeekday()) {
                                                    $duration += 1;
                                                }

                                                echo $duration, " Days"
                                            @endphp

                                        </div>
                                    </div>

                                    <!--Status-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Leave Status</label>

                                        <div class="col-sm-10 col-form-label">
                                            @if($getRecord->leave_status == 0)
                                                <span class="badge bg-primary" style="font-size: 16px">
                                                    Pending
                                                </span>
                                            @elseif($getRecord->leave_status == 1)
                                                <span class="badge bg-success" style="font-size: 16px">
                                                    Approved
                                                </span>
                                            @elseif($getRecord->leave_status == 2)
                                                <span class="badge bg-danger" style="font-size: 16px">
                                                    Rejected
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!--Reject Reason-->
                                    @if(!empty($getRecord->reject_reason))
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Reject Reason</label>

                                            <div class="col-sm-10 col-form-label">
                                                {{ $getRecord->reject_reason }}
                                            </div>
                                        </div>
                                    @endif

                                    <!--Created At-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Created At</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ date('d-F-Y h:i A', strtotime($getRecord->created_at)) }}
                                        </div>
                                    </div>

                                    <!--Updated At-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Updated At</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ date('d-F-Y h:i A', strtotime($getRecord->updated_at)) }}
                                        </div>
                                    </div>


                                </div>

                                <!--Card Footer-->
                                <div class="card-footer">
                                    <a href=" {{ url('admin/leave/history') }} " class="btn btn-default">Back</a>
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
