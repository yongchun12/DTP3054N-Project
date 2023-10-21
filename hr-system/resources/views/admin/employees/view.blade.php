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
                        <h1 class="m-0">View Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/employees') }}">Employees</a></li>
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
                                <h3 class="card-title">View Employees</h3>
                            </div>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                <div class="card-body">

                                    <!-- Note:
                                    - This View doesnt show:
                                    1. id (Not Staff ID)
                                    2. password
                                    3. email_verified_at
                                    4. remember_token
                                    -->

                                    <!--Staff ID-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Staff ID</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->staff_id }}
                                        </div>
                                    </div>

                                    <!--First Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Name</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->name }}
                                        </div>

                                    </div>

                                    <!--Last Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Name</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->last_name }}
                                        </div>

                                    </div>

                                    <!--Email-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->email }}
                                        </div>

                                    </div>

{{--                                    <!--Password-->--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-2 col-form-label">Password</label>--}}

{{--                                        <div class="col-sm-10 col-form-label">--}}
{{--                                            {{ $getRecord->password }}--}}
{{--                                            <!--How to change from Hash Key to Plain Text-->--}}
{{--                                            {{ Crypt::decryptString($getRecord->password) }}--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

                                    <!--Phone Number-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->phone_number }}
                                        </div>

                                    </div>

                                    <!--Hire Date-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hire Date</label>

                                        <div class="col-sm-10 col-form-label">
                                            <!--Change Date Format-->
                                            {{ date('d-F-Y', strtotime($getRecord->hire_date)) }}
                                        </div>

                                    </div>

                                    <!--Position / Job ID-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Position</label>

                                        <div class="col-sm-10 col-form-label">
{{--                                            {{ $getRecord->job_id }}--}}
                                            <!--If job id = 1 then will show what-->
                                            @if($getRecord->job_id == 1)
                                                Web Developer
                                            @elseif($getRecord->job_id == 2)
                                                Accountant
                                            @endif
                                        </div>

                                    </div>

                                    <!--Manager ID / Manager Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Name</label>

                                        <div class="col-sm-10 col-form-label">
                                            @if($getRecord->manager_id == 1)
                                                Yong Chun
                                            @elseif($getRecord->manager_id == 2)
                                                Chee Yi
                                            @endif
                                        </div>

                                    </div>

                                    <!--Department ID / Department Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Department</label>

                                        <div class="col-sm-10 col-form-label">
{{--                                            {{ $getRecord->department_id }}--}}
                                            @if($getRecord->department_id == 1)
                                                Project Department
                                            @elseif($getRecord->department_id == 2)
                                                Finance Department
                                            @endif
                                        </div>

                                    </div>

                                    <!--Employee Category (Full Time, Part Time etc)-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Employee Category</label>

                                        <div class="col-sm-10 col-form-label">
                                            @if($getRecord->category_employee == 0)
                                                Full Time
                                            @elseif($getRecord->category_employee == 1)
                                                Part Time
                                            @elseif($getRecord->category_employee == 2)
                                                Contract
                                            @elseif($getRecord->category_employee == 3)
                                                Temporary
                                            @endif
                                        </div>

                                    </div>

                                    <!--Bank Account-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bank Account</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->bank_acc }}
                                        </div>

                                    </div>

                                    <!--Bank Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bank Name</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->bank_name }}
                                        </div>

                                    </div>

                                    <!--EPF No-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">EPF Number</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->epf_no }}
                                        </div>

                                    </div>

                                    <!--PCB No-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">PCB Number</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->pcb_no }}
                                        </div>

                                    </div>

                                    <!--IC Number-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">IC Number</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->ic_no }}
                                        </div>

                                    </div>

                                    <!--Role Access-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Role</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ !empty($getRecord->is_role) ? 'HR' : 'Employee'}}
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
                                    <a href=" {{ url('admin/employees') }} " class="btn btn-default">Back</a>
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
