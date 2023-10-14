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
                        <h1 class="m-0">Payroll</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/payroll') }}">Payroll</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active"><a href="#">Create Payroll Record</a></li>
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

                            <!--Header-->
                            <div class="card-header">
                                <h3 class="card-title">Create Payroll Record</h3>
                            </div>

                            <!--Form-->
                            <form class="form-horizontal" method="post" accept="{{ url('') }}}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!--Employee Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Employee Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="employee_id">
                                                <option value="">Select Employee Name</option>
                                                @foreach($getEmployee as $getE)
                                                    <option value="{{ $getE->id }}">{{ $getE->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Number of Day Work-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Number of Day Work
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                                <input type="number" value="{{ old('number_of_day_work') }}" name="number_of_day_work"
                                                       class="form-control" required placeholder="Enter Number of Day Work">
                                        </div>

                                    </div>

                                    <!--Bonus-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Bonus
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('bonus') }}" name="bonus"
                                                   class="form-control" required placeholder="Enter Bonus">
                                        </div>

                                    </div>

                                    <!--Overtime-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Overtime
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('overtime') }}" name="overtime"
                                                   class="form-control" required placeholder="Enter Overtime">
                                        </div>

                                    </div>

                                    <!--Gross Salary-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Gross Salary
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('gross_salary') }}" name="gross_salary"
                                                   class="form-control" required placeholder="Enter Gross Salary">
                                        </div>

                                    </div>

                                    <!--Cash Advance-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Cash Advance
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('cash_advance') }}" name="cash_advance"
                                                   class="form-control" required placeholder="Enter Cash Advance">
                                        </div>

                                    </div>

                                    <!--Late Hours-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Late Hours
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('late_hour') }}" name="late_hour"
                                                   class="form-control" required placeholder="Enter Late Hours">
                                        </div>

                                    </div>

                                    <!--Absent Days-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Absent Days
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('absent_days') }}" name="absent_days"
                                                   class="form-control" required placeholder="Enter Absent Days">
                                        </div>

                                    </div>

{{--                                    <!--SSS Contribution-->--}}
{{--                                    <div class="form-group row">--}}

{{--                                        <label class="col-sm-2 col-form-label">SSS contribution--}}
{{--                                            <!--Required-->--}}
{{--                                            <span style="color: red">*</span>--}}
{{--                                        </label>--}}

{{--                                        <div class="col-sm-10">--}}
{{--                                            <input type="text" value="{{ old('sss_contribution') }}" name="sss_contribution"--}}
{{--                                                   class="form-control" required placeholder="Enter SSS Contribution">--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

                                    <!--Health Medicare Allowance-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Medicare Allowance
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('philhealth') }}" name="philhealth"
                                                   class="form-control" required placeholder="Enter Medicare Allowance">
                                        </div>

                                    </div>

                                    <!--Total Deductions-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Total Deductions
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('total_deductions') }}" name="total_deductions"
                                                   class="form-control" required placeholder="Enter Total Deductions">
                                        </div>

                                    </div>

                                    <!--Net Pay-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Net Pay
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('netpay') }}" name="netpay"
                                                   class="form-control" required placeholder="Enter Net Pay">
                                        </div>

                                    </div>

                                    <!--Payroll Monthly-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Payroll Monthly
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('payroll_monthly') }}" name="payroll_monthly"
                                                   class="form-control" required placeholder="Enter Payroll Monthly">
                                        </div>

                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/payroll') }} " class="btn btn-default">Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right">Create Employee</button>
                                    </div>

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
