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

                        <!--Excel Export-->
                        <a href="{{ url('admin/payroll_export') }}" class="btn btn-success">Excel Export</a>

                        <!--Add Payroll Record-->
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

                        <!--Search Function-->
                        <div class="card">
                            <div class="card-header">
                                    <h3 class="card-title">Search Payroll Record</h3>
                            </div>

                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <!--ID-->
                                        <div class="form-group col-md-3">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" placeholder="Enter ID" value="{{ Request()->id }}">
                                        </div>

                                        <!--Employee Name-->
                                        <div class="form-group col-md-3">
                                            <label>Employee Name</label>
                                            <input type="text" name="employee_id" class="form-control" placeholder="Enter Employee Name" value="{{ Request()->employee_id }}">
                                        </div>

                                        <!--Number of Day Work-->
                                        <div class="form-group col-md-3">
                                            <label>Number of Day Work</label>
                                            <input type="text" name="number_of_day_work" class="form-control" placeholder="Enter Number of Day Work" value="{{ Request()->number_of_day_work }}">
                                        </div>

                                        <!--Button-->
                                        <div class="form-group col-md-3" style="margin-top: 32px">
                                            <!--Search Button-->
                                            <button class="btn btn-primary" type="submit">Search</button>

                                            <!--Reset Button-->
                                            <a href="{{ url('admin/payroll') }}" class="btn btn-secondary">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

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
                                                <th>Month / Year</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <!--Content-->
                                        <tbody>
                                        @php
                                            $totalNumberofDayWork = 0;
                                            $totalBonus = 0;
                                            $totalOvertime = 0;
                                        @endphp

                                        @forelse($payrolls as $value)
                                            @php
                                                $totalNumberofDayWork = $totalNumberofDayWork+$value->number_of_day_work;
                                                $totalBonus = $totalBonus+$value->bonus;
                                                $totalOvertime = $totalOvertime+$value->overtime_hours
                                            @endphp

                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ !empty($value->name) ? $value->name : '' }}</td>
                                                <td>{{ $value->number_of_day_work }}</td>
                                                <td>{{ $value->bonus }}</td>
                                                <td>{{ $value->overtime_hours }}</td>
                                                <td>{{ date('F Y', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/payroll/view/'.$value->id) }}"
                                                       class="btn btn-primary">View</a>

                                                    <a href="{{ url('admin/payroll/edit/'.$value->id) }}"
                                                       class="btn btn-secondary">Edit</a>

                                                    <a href="{{ url('admin/payroll/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete?')"
                                                       class="btn btn-danger">Delete</a>

                                                    <a href="{{ url('admin/payroll/pdf/'.$value->id) }}" class="btn btn-primary">Export PDF</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Total All</th>
                                                <td>

                                                </td>
                                                <td>
                                                    {{ $totalNumberofDayWork }}
                                                </td>
                                                <td>
                                                    {{ $totalBonus }}
                                                </td>
                                                <td>
                                                    {{ $totalOvertime }}
                                                </td>
                                                <td></td>
                                                <td></td>
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
