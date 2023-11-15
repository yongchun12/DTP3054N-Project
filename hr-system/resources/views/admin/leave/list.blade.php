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
                        <h1>Pending Leave Application</h1>
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

                        <!--Leave Request List-->
                        <div class="card card-outline card-primary">

                            <div class="card-header">

                                <h3 class="card-title">
                                    <i class="fa-solid fa-clock-rotate-left mr-1"></i>
                                    Pending Request
                                </h3>

                            </div>

                            <div class="card-body">

                                @forelse ($getLeaveRecord as $data)

                                    <!--Calculate Leave Days-->
                                    @php
                                        $from = \Carbon\Carbon::parse($data->from_leaveDate);
                                        $to = \Carbon\Carbon::parse($data->to_leaveDate);
                                        // Calculate the duration including the end date
                                        $duration = $from->diffInWeekdays($to);

                                        // Check if the end date is a weekday to include it in the count
                                        if ($to->isWeekday()) {
                                            $duration += 1;
                                        }
                                    @endphp

                                    <div class="card card-outline card-warning">
                                        <div class="card-header">
                                            <strong>
                                                {{ date('d M, Y', strtotime($data->from_leaveDate)) }}
                                                -
                                                {{ date('d M, Y', strtotime($data->to_leaveDate)) }}
                                                | {{$duration}} Days
                                            </strong>
                                            <!--Previous is : (h:i A d-F-Y)-->
                                            <i class="float-right">Request sent on : {{ date('h:i A | d M, Y', strtotime($data->created_at)) }}</i>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <b>
                                                    <!--Employee Name-->
                                                    Name : {{$data->name}} {{$data->last_name}}
                                                    <br>
                                                    <hr class="my-3">

                                                    <!--Type of Leave-->
                                                    Type of Leave :
                                                    @if($data->type_of_leave == 0)
                                                        Unpaid Leave
                                                    @elseif($data->type_of_leave == 1)
                                                        Annual Leave
                                                    @elseif($data->type_of_leave == 2)
                                                        Medical Leave
                                                    @endif
                                                    <br><br>
                                                </b>
                                            </h5>
                                            <br>
                                            <p class="card-text">{{$data->description}}</p>

                                            <!--Reject Button-->
                                            <a style="margin-left:10px;" class="btn btn-danger float-right" href="{{ url('admin/leave/reject_reason/'.$data->id) }}">
                                                <i class="fa-solid fa-xmark mr-1"></i>
                                                Reject
                                            </a>

                                            <!--Approve Button-->
                                            <a class="btn btn-primary float-right" href="{{ url('admin/leave/approve/'.$data->id) }}">
                                                <i class="fa-solid fa-check mr-1"></i>
                                                Accept
                                            </a>

                                        </div>
                                    </div>

                                @empty
                                    <div class="card card-outline card-success">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <b>
                                                    No Pending Request
                                                </b>
                                            </h5>
                                        </div>
                                    </div>
                                @endforelse

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
