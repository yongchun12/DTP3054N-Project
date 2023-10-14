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
                        <h1>Payroll</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
                        <a href=" {{ url('admin/payroll/create') }} " class="btn btn-primary"> Add Payroll Record</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Payroll List-->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-md-12">

                            <!--Alert Message-->
                            @include('layouts.alert_message')

                            <div class="card">
                                <!--Title-->
                                <div class="card-header">
                                    <h3 class="card-title">Payroll List</h3>
                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-striped">

                                        <thead>
                                        <!--tr is Table Row-->
                                            <tr>
                                                <th>ID</th>
                                                <th>Employee Name</th>
                                                <th>Number of Day Work</th>
                                                <th>Bonus</th>
                                                <th>Overtime</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <!--Content-->
                                        <tbody>

                                        @foreach($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ !empty($value->name) ? $value->name : '' }}</td>
                                                <td>{{ $value->number_of_day_work }}</td>
                                                <td>{{ $value->bonus }}</td>
                                                <td>{{ $value->overtime }}</td>
                                                <td>
                                                    <a href="{{ url('admin/payroll/view/'.$value->id) }}"
                                                       class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
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
