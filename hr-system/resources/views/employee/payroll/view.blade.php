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
                        <h1 class="m-0">View Record</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('employee/payroll') }}"> Payroll Record </a></li>
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
                            <div class="card-header">
                                <h3 class="card-title">View Record</h3>
                            </div>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                <div class="card-body">

                                    <!--ID-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ID
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->id }}
                                        </div>
                                    </div>

                                    <!--Employee Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Employee Name
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            <!--If getRecord from the id is found then print the name if not then leave it out -->
                                            {{ !empty($getRecord->get_employee_name->name) ? $getRecord->get_employee_name->name : '' }}
                                        </div>
                                    </div>

                                    <!--Gross Salary-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gross Salary
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            RM {{ $getRecord->gross_salary }}
                                        </div>
                                    </div>

                                    <!--Number of Day Work-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Number of Day Work
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->number_of_day_work }} Days
                                        </div>
                                    </div>

                                    <!--Absent Days-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Absent Days
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->absent_days }} Days
                                        </div>
                                    </div>

                                    <!--Overtime-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Overtime Hours
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->overtime_hours }} Hours
                                        </div>
                                    </div>

                                    <!--Bonus-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bonus
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            RM {{ $getRecord->bonus }}
                                        </div>
                                    </div>

                                    <!--Medical Allowance-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Medical Allowance
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            RM {{ $getRecord->medical_allowance }}
                                        </div>
                                    </div>

                                    <!--Medical Allowance-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Other Allowance
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            RM {{ $getRecord->other_allowance }}
                                        </div>
                                    </div>

                                    <!--Sub-Total Salary-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Sub-Total Salary
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            @php
                                                $total_overtime = ($getRecord->gross_salary / 22 / 8 * 1.5) * $getRecord->overtime_hours;

                                                $sub_total = $getRecord->gross_salary + $getRecord->bonus +
                                                             $getRecord->medical_allowance + $getRecord->other_allowance +
                                                             $total_overtime;

                                                echo "RM ", number_format((float)$sub_total, 2, '.', '');
                                            @endphp
                                        </div>
                                    </div>

                                    <!--EPF-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">EPF
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            @php
                                                $epf = $getRecord->gross_salary * 0.11;

                                                echo "RM ", $epf;
                                            @endphp
                                        </div>
                                    </div>

                                    <!--SOCSO-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SOCSO
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            @php
                                                $socso = $getRecord->gross_salary * 0.005;

                                                echo "RM ", $socso;
                                            @endphp
                                        </div>
                                    </div>

                                    <!--PCB Tax-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">PCB Tax
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            @php
                                                $pcb = $getRecord->gross_salary * 0.02;

                                                echo "RM ", $pcb;
                                            @endphp
                                        </div>
                                    </div>

                                    <!--Total Deduction-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Total Deduction
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            RM {{ $getRecord->total_deductions }}
                                        </div>
                                    </div>

                                    <!--Payroll Monthly-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Monthly Allowance
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 col-form-label">
                                            RM {{ $getRecord->payroll_monthly }}
                                        </div>
                                    </div>

                                    <!--Created Date-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Created Date</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ date('d-F-Y h:i A', strtotime($getRecord->created_at)) }}
                                        </div>

                                    </div>

                                    <!--Last Updated-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Updated</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ date('d-F-Y h:i A', strtotime($getRecord->updated_at)) }}
                                        </div>

                                    </div>

                                </div>

                                <!--Card Footer-->
                                <div class="card-footer">
                                    <a href=" {{ url('employee/payroll') }} " class="btn btn-default">Back</a>
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
