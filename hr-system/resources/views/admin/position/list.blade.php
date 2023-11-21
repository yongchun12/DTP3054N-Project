<!--Table List Employees-->
@extends('layouts.plugins')

@section('title', 'Position List')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <i class="fa-solid fa-user-plus mr-1"></i>
                            Position List
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">

                        <!--Add Department Record-->
                        <a href=" {{ url('admin/position/create') }} " class="btn btn-primary" style="margin-left: 5px;">
                            <i class="fa-solid fa-plus mr-1"></i>
                            Create Position
                        </a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Position List-->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-md-12">

                        <!--Alert Message-->
                        @include('layouts.alert_message')

                            <div class="card card-outline card-primary">
                                <!--Title-->
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa-solid fa-user-plus mr-1"></i>
                                        Position List
                                    </h3>
                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-striped">

                                        <thead>
                                        <!--tr is Table Row-->
                                            <tr>
                                                <th style="text-align: center">ID</th>
                                                <th style="text-align: center">Position Name</th>
                                                <th style="text-align: center">Department Name</th>
                                                <th style="text-align: center">Created At</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>

                                        <!--Content-->
                                        <tbody>

                                        @forelse($getRecord as $data)

                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">{{ $data->id }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ $data->position_name }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ $data->department_name }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ date('d-M-Y | h:i:s A', strtotime($data->created_at)) }}</td>
                                                <td style="vertical-align: middle; text-align: center;">

                                                    <!--View Button-->
                                                    <a href="{{ url('admin/position/view/'.$data->id) }}" class="btn btn-outline-primary">
                                                        <i class="fa-regular fa-file-lines mr-1"></i>
                                                        View
                                                    </a>

                                                    <!--Edit Button-->
                                                    <a href="{{ url('admin/position/edit/'.$data->id) }}" class="btn btn-outline-secondary" style="margin-left: 5px;">
                                                        <i class="fa-regular fa-pen-to-square mr-1"></i>
                                                        Edit
                                                    </a>

                                                    <!--Delete Button-->
                                                    <a href="{{ url('admin/position/delete/'.$data->id) }}" onclick="return confirm('Are you sure want to delete?')"
                                                       class="btn btn-outline-danger" style="margin-left: 5px;">
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

                                        </tbody>

                                    </table>

                                    <div style="padding: 10px; float: right;">
                                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
