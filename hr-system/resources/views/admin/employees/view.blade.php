<!--View Employees-->
@extends('layouts.plugins')

@section('title', 'View Employee')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <i class="fa-regular fa-file-lines mr-2"></i>
                            View Employees Record
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/employees') }}">Employees</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active">View Record</li>
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
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa-regular fa-file-lines mr-1"></i>
                                    View Employees
                                </h3>
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

                                    <!--Profile Picture-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Profile Picture</label>

                                        <div class="col-sm-10 col-form-label">
                                            @if(!empty($getRecord->profile_picture))
                                                @if(file_exists(public_path('img/profile_picture/'.$getRecord->profile_picture)))
                                                    <img src="{{ asset('img/profile_picture/'.$getRecord->profile_picture) }}" width="50px" height="50px" style="vertical-align: middle;">
                                                @endif
                                            @endif
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

                                    <!--Phone Number-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->phone_number }}
                                        </div>

                                    </div>

                                    <!--Address-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->address }}
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

                                    <!--Department ID / Department Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Department</label>

                                        <div class="col-sm-10 col-form-label">
                                            @foreach($getDepartment as $department)
                                                @if($getRecord->department_id == $department->id)
                                                    {{ $department->department_name }}
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>

                                    <!--Position / Job ID-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Position</label>

                                        <div class="col-sm-10 col-form-label">
                                            @foreach($getPosition as $position)
                                                @if($getRecord->position_id == $position->id)
                                                    {{ $position->position_name }}
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>

                                    <!--Manager ID / Manager Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Name</label>

                                        <div class="col-sm-10 col-form-label">
                                            @foreach($getManager as $manager)
                                                @if($getRecord->manager_id == $manager->id)
                                                    {{ $manager->name }}
                                                @endif
                                            @endforeach
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

                                    <!--Balance Annual Leave Days-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Balance Annual Leave Days</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->annual_leaveDays }}
                                        </div>

                                    </div>

                                    <!--Balance Medical Leave Days-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Balance Medical Leave Days</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->medical_leaveDays }}
                                        </div>

                                    </div>

                                    <!--Bank Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bank Name</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->bank_name }}
                                        </div>

                                    </div>

                                    <!--Bank Account-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bank Account</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->bank_acc }}
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
                                    <a href=" {{ url('admin/employees') }} " class="btn btn-default">
                                        <i class="fa-solid fa-arrow-left mr-1"></i>
                                            Back
                                    </a>
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
