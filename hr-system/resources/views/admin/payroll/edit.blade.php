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
                            <li class="breadcrumb-item active"><a href="#">Edit Payroll Record</a></li>
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
                                <h3 class="card-title">Edit Payroll Record</h3>
                            </div>

                            <!--Form-->
                            <form class="form-horizontal" method="post" accept="{{ url('admin/payroll/edit/'.$getRecord->id) }}}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!--Card Body-->
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
                                                @foreach($getEmployee as $value_employee)
                                                    <option {{ ($value_employee->id == $getRecord->employee_id) ? 'selected' : '' }} value="{{ $value_employee->id }}">
                                                        {{ $value_employee->name }}
                                                    </option>
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

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->gross_salary }}" name="gross_salary"
                                                   class="form-control" required placeholder="Enter Gross Salary" id="gross_salary" oninput="calculateDeduction(); calculateAllowance();">
                                        </div>

                                    </div>

                                    <!--Number of Day Work-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Number of Day Work
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->number_of_day_work }}" name="number_of_day_work"
                                                   class="form-control" required placeholder="Default 22 Days" id="num_work" readonly>
                                        </div>

                                    </div>

                                    <!--Absent Days-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Absent Days
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->absent_days }}" name="absent_days"
                                                   class="form-control" required placeholder="Enter Absent Days" id="absent_days" max="22" oninput="calculateDeduction(); calculateAllowance();">
                                        </div>

                                    </div>

                                    <!--Overtime Hours-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Overtime Hours
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->overtime_hours }}" name="overtime_hours"
                                                   class="form-control" required placeholder="Enter Overtime" id="overtime" oninput="calculateAllowance()">
                                        </div>

                                    </div>

                                    <!--Bonus-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Bonus
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value={{ $getRecord->bonus }} name="bonus"
                                                   class="form-control" required placeholder="Enter Bonus" id="bonus" oninput="calculateAllowance()">
                                        </div>

                                    </div>

                                    <!--Health Medicare Allowance-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Medicare Allowance
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->medical_allowance }}" name="medical_allowance"
                                                   class="form-control" required placeholder="Enter Medicare Allowance" id="medical_allowance" oninput="calculateAllowance()">
                                        </div>

                                    </div>

                                    <!--Other Allowance-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Other Allowance
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->other_allowance }}" name="other_allowance"
                                                   class="form-control" required placeholder="Enter Other Allowance" id="other_allowance" oninput="calculateAllowance()">
                                        </div>

                                    </div>

                                    <!--Total Allowance-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Sub-Total Salary
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->total_allowance }}" class="form-control" id="total_allowance" placeholder="Sub-Total Salary" readonly>
                                        </div>

                                    </div>

                                    <!--EPF-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">EPF
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="epf" placeholder="EPF Rate = 11%" readonly>
                                        </div>

                                    </div>

                                    <!--SOCSO-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">SOCSO
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="socso" placeholder="SOCSO Rate = 0.5%" readonly>
                                        </div>

                                    </div>

                                    <!--PCB-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">PCB
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="pcb" placeholder="PCB Rate = 2%" readonly>
                                        </div>

                                    </div>

                                    <!--Total Deductions-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Total Deductions
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->total_deductions }}" name="total_deductions"
                                                   class="form-control" required placeholder="Total Deductions" id="total_deductions" readonly>
                                        </div>

                                    </div>

                                    <!--Payroll Monthly-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Net Pay
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->payroll_monthly }}" name="payroll_monthly"
                                                   id="payroll_monthly" class="form-control" required placeholder="Total Salary" readonly>
                                        </div>

                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/payroll') }} " class="btn btn-default">Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right">Update</button>
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
