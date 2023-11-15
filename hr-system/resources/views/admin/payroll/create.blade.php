<!--Create Payroll Record-->
@extends('layouts.plugins')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Payroll Record</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/payroll') }}">Payroll</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active">Create Payroll Record</li>
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
                        <div class="card card-primary">

                            <!--Header-->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa-solid fa-plus mr-1"></i>
                                    Create Payroll Record
                                </h3>
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
                                            <select class="form-control" name="employee_id" required>
                                                <option disabled selected value="">Select Employee Name</option>
                                                @foreach($getEmployee as $getE)
                                                    <option value="{{ $getE->id }}">{{ $getE->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Gross Salary-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Gross Salary
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="number" value="0" name="gross_salary"
                                                   class="form-control" required placeholder="Enter Gross Salary" id="gross_salary" oninput="calculateDeduction(); calculateAllowance();">
                                        </div>

                                    </div>

                                    <!--Number of Day Work-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Number of Day Work
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <input type="number" value="{{ old('number_of_day_work') }}" name="number_of_day_work"
                                                   class="form-control" required placeholder="Default 22 Days" id="num_work" readonly>

                                            <div class="input-group-append">
                                                <span class="input-group-text">Days</span>
                                            </div>
                                        </div>

                                    </div>

                                    <!--Absent Days-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Absent Days
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <input type="number" value="{{ old('absent_days') }}" name="absent_days"
                                                   class="form-control" required placeholder="Enter Absent Days" id="absent_days" max="22" oninput="calculateDeduction(); calculateAllowance();">

                                            <div class="input-group-append">
                                                <span class="input-group-text">Days</span>
                                            </div>
                                        </div>

                                    </div>

                                    <!--Overtime Hours-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Overtime Hours
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <input type="number" value="0" name="overtime_hours"
                                                   class="form-control" required placeholder="Enter Overtime" id="overtime" oninput="calculateAllowance()">

                                            <div class="input-group-append">
                                                <span class="input-group-text">Hours</span>
                                            </div>
                                        </div>

                                    </div>

                                    <!--Bonus-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Bonus
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="number" value="0" name="bonus"
                                                   class="form-control" required placeholder="Enter Bonus" id="bonus" oninput="calculateAllowance()">
                                        </div>

                                    </div>

                                    <!--Health Medicare Allowance-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Medicare Allowance
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="number" value="0" name="medical_allowance"
                                                   class="form-control" required placeholder="Enter Medicare Allowance" id="medical_allowance" oninput="calculateAllowance()">
                                        </div>

                                    </div>

                                    <!--Other Allowance-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Other Allowance
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="number" value="0" name="other_allowance"
                                                   class="form-control" required placeholder="Enter Other Allowance" id="other_allowance" oninput="calculateAllowance()">
                                        </div>

                                    </div>

                                    <!--Sub-Total Allowance-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Sub-Total Salary
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="number" class="form-control" id="total_allowance" placeholder="Sub-Total Salary" readonly>
                                        </div>

                                    </div>

                                    <!--EPF-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">EPF
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="number" class="form-control" id="epf" placeholder="EPF Rate = 11%" readonly>
                                        </div>

                                    </div>

                                    <!--SOCSO-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">SOCSO
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="number" class="form-control" id="socso" placeholder="SOCSO Rate = 0.5%" readonly>
                                        </div>

                                    </div>

                                    <!--PCB-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">PCB Tax
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="number" class="form-control" id="pcb" placeholder="PCB Rate = 2%" readonly>
                                        </div>

                                    </div>

                                    <!--Total Deductions-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Total Deductions
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="number" value="{{ old('total_deductions') }}" name="total_deductions"
                                                   class="form-control" required placeholder="Enter Total Deductions" id="total_deductions" readonly>
                                        </div>

                                    </div>

                                    <!--Payroll Monthly-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Net Pay
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>

                                            <input type="text" value="{{ old('payroll_monthly') }}" name="payroll_monthly"
                                                   id="payroll_monthly" class="form-control" required placeholder="Enter Total Salary" readonly>
                                        </div>

                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/payroll') }} " class="btn btn-default"><i class="fa-solid fa-xmark mr-1"></i>Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-plus mr-1"></i>Create Payroll Record</button>
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
