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

                                        <div class="col-sm-10">
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

                                        <div class="col-sm-10">
                                                <input type="number" value="{{ old('number_of_day_work') }}" name="number_of_day_work"
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
                                            <input type="number" value="{{ old('absent_days') }}" name="absent_days"
                                                   class="form-control" required placeholder="Enter Absent Days" id="absent_days" max="22" oninput="calculateDeduction()">
                                        </div>

                                    </div>

                                    <!--Overtime Hours-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Overtime Hours
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="0" name="overtime_hours"
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

                                        <div class="col-sm-10">
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

                                        <div class="col-sm-10">
                                            <input type="number" value="0" name="other_allowance"
                                                   class="form-control" required placeholder="Enter Other Allowance" id="other_allowance" oninput="calculateAllowance()">
                                        </div>

                                    </div>

                                    <!--Total Allowance-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Total Salary
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="total_allowance" placeholder="Total Salary" readonly>
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

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('payroll_monthly') }}" name="payroll_monthly"
                                                   id="payroll_monthly" class="form-control" required placeholder="Enter Total Salary" readonly>
                                        </div>

                                    </div>

                                    <script>

                                        function calculateDeduction() {

                                            var gross_salary = document.getElementById('gross_salary').value;

                                            //Calculate EPF
                                            let epf_rate = 0.11;
                                            var epf = gross_salary * epf_rate;

                                            document.getElementById('epf').value = epf.toFixed(2);

                                            //Calculate PCB
                                            let pcb_rate = 0.02;
                                            var pcb = gross_salary * pcb_rate;

                                            document.getElementById('pcb').value = pcb.toFixed(2);

                                            //Calculate Days Work and Leave
                                            let default_dayswork = 22;

                                            absent_days = document.getElementById('absent_days').value;

                                            document.getElementById('num_work').value = default_dayswork - absent_days;

                                            //Calculate Total Deduction
                                            var total_deduction = epf + pcb + (gross_salary / default_dayswork) * absent_days;
                                            document.getElementById('total_deductions').value = total_deduction.toFixed(2);
                                        }

                                        function calculateAllowance() {
                                            let default_dayswork = 22;
                                            var gross_salary = parseFloat(document.getElementById('gross_salary').value);

                                            var bonus = parseFloat(document.getElementById('bonus').value);
                                            var medicare_allowance = parseFloat(document.getElementById('medical_allowance').value);
                                            var other_allowance = parseFloat(document.getElementById('other_allowance').value);

                                            // Calculate Overtime Hours
                                            var total_overtime = ((gross_salary / default_dayswork / 8 * 1.5) * parseFloat(document.getElementById('overtime').value));

                                            // Calculate Total Earning
                                            var total_earning = bonus + medicare_allowance + other_allowance + total_overtime + gross_salary;

                                            // Make sure 'total_allowance' element exists in your HTML
                                            var totalAllowance = document.getElementById('total_allowance');

                                                totalAllowance.value = total_earning.toFixed(2);

                                            var net_pay = total_earning - parseFloat(document.getElementById('total_deductions').value);

                                            document.getElementById('payroll_monthly').value = net_pay.toFixed(2);
                                        }

                                    </script>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/payroll') }} " class="btn btn-default">Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right">Create Payroll Record</button>
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
