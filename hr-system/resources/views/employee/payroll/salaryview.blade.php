@extends('layouts.plugins')

@section('content')

    <?php
    $basic_salary = $getRecord->gross_salary;
    $default_dayswork = 22;

    $number_of_day_work = ($basic_salary / $default_dayswork) * $getRecord->number_of_day_work;
    $over_time = ($basic_salary / $default_dayswork / 8) * $getRecord->overtime_hours;
    $medical_allowance = $getRecord->medical_allowance;
    $other_allowance = $getRecord->other_allowance;
    $bonus = $getRecord->bonus;

    $total_earning = $number_of_day_work + $over_time + $medical_allowance + $other_allowance + $bonus;

    $epf = $getRecord->gross_salary * 0.11;
    $pcb = $getRecord->gross_salary * 0.02;
    $unpaid_leave = $getRecord->absent_days;

    $total_deduction = $epf + $pcb + ($basic_salary / $default_dayswork * $unpaid_leave);

    $net_pay = $total_earning - $total_deduction;
    ?>

    <div class="content-wrapper">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center lh-1 mb-2">
                        <h1 class="fw-bold">Payslip</h1> <span class="fw-normal">Payment slip for the month of {{ \Carbon\Carbon::parse($getRecord->created_at)->format('M') }} {{ \Carbon\Carbon::parse($getRecord->created_at)->format('Y') }}</span>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <!--Staff ID-->
                                <div class="col-md-6">
                                    <div>
                                <span class="fw-bolder">
                                    Employee Code:
                                    @foreach($getEmployee as $value_employee)
                                        {{ ($value_employee->id == $getRecord->employee_id) ? ($value_employee->staff_id) : '' }}
                                    @endforeach
                                </span>
                                    </div>
                                </div>

                                <!--Employee Name-->
                                <div class="col-md-6">
                                    <div> <span class="fw-bolder">Employee Name:
                                            <!--Need to use foreach to check the value-->
                                    @foreach($getEmployee as $value_employee)
                                                {{ ($value_employee->id == $getRecord->employee_id) ? ($value_employee->name) : '' }}
                                            @endforeach
                                            @foreach($getEmployee as $value_employee)
                                                {{ ($value_employee->id == $getRecord->employee_id) ? ($value_employee->last_name) : '' }}
                                            @endforeach
                                </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                <span class="fw-bolder">Phone Number:
                                    @foreach($getEmployee as $value_employee)
                                        {{ ($value_employee->id == $getRecord->employee_id) ? ($value_employee->phone_number) : '' }}
                                    @endforeach
                                </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                <span class="fw-bolder">Hire Date:
                                    @foreach($getEmployee as $value_employee)
                                        {{ ($value_employee->id == $getRecord->employee_id) ? date('d-F-Y', strtotime($value_employee->hire_date)) : '' }}
                                    @endforeach
                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                <span class="fw-bolder">Position:
                                    @foreach($getEmployee as $value_employee)
                                        @if($value_employee->id == $getRecord->employee_id)
                                            @if($value_employee->job_id == 1)
                                                Web Developer
                                            @elseif($value_employee->job_id == 2)
                                                Accountant
                                            @endif
                                        @endif($value_employee->id == $getRecord->employee_id)
                                    @endforeach
                                </span>
                                    </div>
                                </div>

                                <!--Department-->
                                <div class="col-md-6">
                                    <div>
                                <span class="fw-bolder">Department:
                                    @foreach($getEmployee as $value_employee)
                                        @if($value_employee->id == $getRecord->employee_id)
                                            @if($value_employee->department_id == 1)
                                                Project Department
                                            @elseif($value_employee->department_id == 2)
                                                Finance Department
                                            @endif
                                        @endif
                                    @endforeach
                                </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <table class="mt-4 table table-bordered">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Earnings</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Deductions</th>
                                <th scope="col">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Basic Salary</th>
                                <td>
                                    RM
                                    {{ $getRecord->gross_salary }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Number of Working Days</th>
                                <td>{{ $getRecord->number_of_day_work }} days</td>
                                <td>Unpaid Leave</td>
                                <td>{{ $getRecord->absent_days }} days</td>
                            </tr>
                            <tr>
                                <th scope="row">Overtime Hours</th>
                                <td>{{ $getRecord->overtime_hours }} hours</td>
                                <td>EPF</td>
                                <td>11 % = RM <?php echo number_format((float)$epf, 2, '.', '');?></td>
                            </tr>
                            <tr>
                                <th scope="row">Medical Allowance</th>
                                <td>RM {{ $getRecord->medical_allowance }}</td>
                                <td>PCB Tax</td>
                                <td>2% = RM <?php echo number_format((float)$pcb, 2, '.', '');?></td>
                            </tr>
                            <tr>
                                <th scope="row">Other Allowance</th>
                                <td>RM {{ $getRecord->other_allowance }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Bonus</th>
                                <td>RM {{ $getRecord->bonus }}</td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr class="border-top">
                                <th scope="row">Total Earning</th>
                                <td>RM <?php echo number_format((float)$total_earning, 2, '.', '');?></td>
                                <td>Total Deductions</td>
                                <td>RM <?php echo number_format((float)$total_deduction, 2, '.', '');?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <br>

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">Net Pay : RM <?php echo number_format((float)$net_pay, 2, '.', '');?></span>
                        <span class="fw-bold">For HR System Authorised Signature</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
