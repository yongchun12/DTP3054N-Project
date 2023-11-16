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
                        <h1><i class="fa-solid fa-landmark mr-1"></i>Payroll</h1>
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

                        <div class="card card-outline card-primary">
                            <!--Title-->
                            <div class="card-header">
                                <h3 class="card-title"><i class="fa-solid fa-list mr-1"></i>Payroll List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">

                                    <thead>
                                    <!--tr is Table Row-->
                                    <tr style="text-align: center">
                                        <th>Month / Year</th>
                                        <th>Number of Day Work</th>
                                        <th>Bonus</th>
                                        <th>Overtime</th>
                                        <th>Net Pay</th>
                                        <th>Action</th>
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

                                    @forelse($payrolls as $value)

                                        <!--Calculate Total-->
                                        @php
                                            $totalNumberofDayWork = $totalNumberofDayWork+$value->number_of_day_work;
                                            $totalBonus = $totalBonus+$value->bonus;
                                            $totalOvertime = $totalOvertime+$value->overtime_hours;
                                            $totalNetPay = $totalNetPay+$value->payroll_monthly;
                                        @endphp


                                        <tr>
                                            <td style="vertical-align: middle; text-align: center;">{{ date('F Y', strtotime($value->created_at)) }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $value->number_of_day_work }} Days</td>
                                            <td style="vertical-align: middle; text-align: center;">RM {{ $value->bonus }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $value->overtime_hours }} hours</td>
                                            <td style="vertical-align: middle; text-align: center;">RM {{ $value->payroll_monthly }}</td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                <a href="{{ url('employee/payroll/view/'.$value->id) }}"
                                                   class="btn btn-outline-primary">
                                                    <i class="fa-regular fa-file-lines mr-1"></i>
                                                    View
                                                </a>

                                                <a href="{{ url('employee/payroll/pdf/'.$value->id) }}" class="btn btn-outline-primary" style="margin-left: 5px;">
                                                    <i class="fa-regular fa-file-pdf mr-1"></i>
                                                    Export PDF
                                                </a>
                                            </td>
                                        </tr>

                                        @empty
                                            <tr>
                                                <td colspan="100%" style="text-align: center">No Data</td>
                                            </tr>
                                        @endforelse

                                    <tr>
                                        <th style="text-align: center">Total All</th>
                                        <td style="vertical-align: middle; text-align: center; padding-left: 12px;">
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
                                    </tr>

                                    </tbody>

                                </table>

                                <div style="padding: 10px; float: right;">
                                    {!! $payrolls->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
