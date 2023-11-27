<!--Payroll Record List-->
@extends('layouts.plugins')

@section('title', 'Payroll List')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            <i class="fa-solid fa-landmark mr-1"></i>
                            Payroll
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">

                        <!--Excel Export-->
                        <a href="{{ url('admin/payroll_export') }}" class="btn btn-success">
                            <i class="fa-regular fa-file-excel mr-1"></i>
                            Excel Export
                        </a>

                        <!--Add Payroll Record-->
                        <a href=" {{ url('admin/payroll/create') }} " class="btn btn-primary" style="margin-left: 5px;">
                            <i class="fa-solid fa-plus mr-1"></i>
                            Add Payroll Record
                        </a>
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
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa-solid fa-magnifying-glass mr-1"></i>
                                        Search Payroll Record
                                    </h3>
                            </div>

                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

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
                                        <div class="form-group col-md-3">
                                            <!--Search Button-->
                                            <button class="btn btn-primary" type="submit" style="margin-top: 32px">
                                                <i class="fa-solid fa-magnifying-glass mr-1"></i>
                                                Search
                                            </button>

                                            <!--Reset Button-->
                                            <a href="{{ url('admin/payroll') }}">
                                                <button class="btn btn-secondary" style="margin-top: 32px; margin-left: 5px;" type="button">
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
                                        Payroll List
                                    </h3>
                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-striped">

                                        <thead>
                                        <!--tr is Table Row-->
                                            <tr>
                                                <th style="text-align: center">ID</th>
                                                <th style="text-align: center">Employee Name</th>
                                                <th style="text-align: center">Number of Day Work</th>
                                                <th style="text-align: center">Bonus</th>
                                                <th style="text-align: center">Overtime</th>
                                                <th style="text-align: center">Net Pay</th>
                                                <th style="text-align: center">Month / Year</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>

                                        <!--Content-->
                                        <tbody>
                                        @php
                                            $totalNumberofDayWork = 0;
                                            $totalBonus = 0;
                                            $totalOvertime = 0;
                                            $totalNetPay = 0;
                                        @endphp

                                        @forelse($getRecord as $value)
                                            @php
                                                $totalNumberofDayWork = $totalNumberofDayWork+$value->number_of_day_work;
                                                $totalBonus = $totalBonus+$value->bonus;
                                                $totalOvertime = $totalOvertime+$value->overtime_hours;
                                                $totalNetPay = $totalNetPay+$value->payroll_monthly;
                                            @endphp

                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">{{ $value->id }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ !empty($value->name) ? $value->name : '' }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ $value->number_of_day_work }} Days</td>
                                                <td style="vertical-align: middle; text-align: center;">RM {{ $value->bonus }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ $value->overtime_hours }} hours</td>
                                                <td style="vertical-align: middle; text-align: center;">RM {{ $value->payroll_monthly }}</td>
                                                <td style="vertical-align: middle; text-align: center;">{{ date('F Y', strtotime($value->created_at)) }}</td>
                                                <td style="vertical-align: middle; text-align: center;">

                                                    <!--View Button-->
                                                    <a href="{{ url('admin/payroll/view/'.$value->id) }}" class="btn btn-outline-primary">
                                                        <i class="fa-regular fa-file-lines mr-1"></i>
                                                        View
                                                    </a>

                                                    <!--Edit Button-->
                                                    <a href="{{ url('admin/payroll/edit/'.$value->id) }}" class="btn btn-outline-secondary" style="margin-left: 5px;">
                                                        <i class="fa-regular fa-pen-to-square mr-1"></i>
                                                        Edit
                                                    </a>

                                                    <!--Delete Button-->
                                                    <a href="{{ url('admin/payroll/delete/'.$value->id) }}" onclick="return confirm('Are you sure want to delete?')"
                                                       class="btn btn-outline-danger" style="margin-left: 5px;">
                                                        <i class="fa-regular fa-trash-can mr-1"></i>
                                                        Delete
                                                    </a>

                                                    <!--Export PDF Button-->
                                                    <a href="{{ url('admin/payroll/pdf/'.$value->id) }}" class="btn btn-outline-primary" style="margin-left: 5px;">
                                                        <i class="fa-regular fa-file-pdf mr-1"></i>
                                                        Export PDF
                                                    </a>

                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="100%" style="text-align: center">No Record Found</td>
                                            </tr>

                                        @endforelse

                                        <tr>
                                            <th style="text-align: center">Total All</th>
                                            <td></td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ $totalNumberofDayWork }} Days
                                            </td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                RM {{ $totalBonus }}
                                            </td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                {{ $totalOvertime }} hours
                                            </td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                RM {{ $totalNetPay }}
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>

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
