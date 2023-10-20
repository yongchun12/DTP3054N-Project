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

                        <!--Leave Request List-->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="panel-title" style="text-align:center;">Pending Requests</h3>
                                <br>

                                @foreach ($leave as $data)
                                    <div class="card text-white bg-dark mb-3">
                                        <div class="card-header bg-dark ">
                                            <strong>{{$data->date_of_leave}} {{$data->name}}</strong>
                                            <i class="float-right" style="font-size:85%;">Request sent on :- {{$data->created_at}}</i>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                @if($data->type_of_leave == 0)
                                                    Unpaid Leave
                                                @elseif($data->type_of_leave == 1)
                                                    Normal Leave
                                                @elseif($data->type_of_leave == 2)
                                                    Medical Leave
                                                @endif
                                            </h5>
                                            <p class="card-text">{{$data->description}}</p>

                                            <a style="margin-left:10px;" class="btn btn-danger float-right " href="/decline-request/{{$data->id}}">Decline</a>
                                            <a class="btn btn-primary float-right" href="{{ url('admin/leave/approve/'.$data->id) }}">Accept</a>

                                        </div>
                                    </div>

                                @endforeach



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
