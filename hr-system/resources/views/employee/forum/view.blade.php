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
                        <h1>Topic View</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Content-->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-md-12">

                        <!--Alert Message-->
                        @include('layouts.alert_message')

                        <!--View Topic Data-->
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>
                                    @foreach($getEmployee as $data_employee)
                                        {{ ($data_employee->id == $getRecord->employee_id) ? ($data_employee->name) : '' }}
                                    @endforeach
                                </strong>
                                <i class="float-right">Created on : {{ date('h:i A d-F-Y', strtotime($getRecord->created_at)) }}</i>
                            </div>
                            <div class="card-body">
                                <strong>{{ $getRecord->title }}</strong>
                                <p class="card-text">{{$getRecord->description}}</p>

                            </div>
                        </div>

                        <!--Space-->
                        <div class="row col-md-12"><br></div>

                        <!--Reply-->
                        <div class="content-header">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Reply</h1>
                                </div><!-- /.col -->
                            </div>
                        </div>

                        <!--View Reply-->
                        @forelse($getReply as $data)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>
                                        @foreach($getEmployee as $data_employee)
                                            {{ ($data_employee->id == $data->employee_id) ? ($data_employee->name) : '' }}
                                        @endforeach
                                    </strong>
                                    <i class="float-right">Created on : {{ date('h:i A d-F-Y', strtotime($data->created_at)) }}</i>
                                </div>
                                <div class="card-body">
                                    <strong>{{ $data->title }}</strong>
                                    <p class="card-text">{{$data->description}}</p>

                                </div>
                            </div>

                        @empty
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>
                                        No Reply Yet. Be the first to reply!
                                    </strong>
                                </div>
                            </div>

                        @endforelse

                        <!--Create Reply-->
                        <div class="card card-info">

                            <!--Card Header-->
                            <div class="card-header">
                                <h3 class="card-title">Reply</h3>
                            </div>

                            <form class="form-horizontal" method="post" accept="{{ url('employee/forum/view/'.$getRecord->id) }}}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!--Get Current Forum ID-->
                                <input type="hidden" value="{{$getRecord->id}}" name="forum_id">

                                <!--Card Info-->
                                <div class="card-body">

                                    <!--Title-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Title
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <!--value: old is validation for check the type of the input-->
                                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Enter Title">
                                        </div>

                                    </div>

                                    <!--Description-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Description
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="description" placeholder="Enter Description" required></textarea>
                                        </div>

                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-right">Create Reply</button>
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

@endsection
