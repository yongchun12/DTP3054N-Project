<!--Create Employees-->
@extends('layouts.plugins')

@section('title', 'Edit Employees')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/employees') }}">Employees</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active">Edit Employees Details</li>
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
                                    <i class="fa-regular fa-pen-to-square mr-1"></i>
                                    Edit Employees Details
                                </h3>
                            </div>

                            <form class="form-horizontal" method="post" action="{{ url('admin/employees/edit/' .$getRecord->id) }}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!--ID-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ID</label>

                                        <div class="col-sm-10 col-form-label">
                                            {{ $getRecord->staff_id }}
                                        </div>
                                    </div>

                                    <!--Profile Picture-->
                                    <div class="form-group row">

                                        <label for="formFile" class="col-sm-2 col-form-label">Profile Picture</label>

                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="profile_picture">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>

                                            <br><br>

                                            @if(!empty($getRecord->profile_picture))
                                                @if(file_exists(public_path('img/profile_picture/'.$getRecord->profile_picture)))
                                                    <img src="{{ asset('img/profile_picture/'.$getRecord->profile_picture) }}" width="50px" height="50px" style="vertical-align: middle;">
                                                @endif
                                            @endif

                                        </div>

                                    </div>

                                    <!-- If want add column then copy this-->
                                    <!-- "name" should put the column name-->
                                    <!--First Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">First Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <!--value: old is validation for check the type of the input-->
                                            <input type="text" value="{{ $getRecord->name }}" name="name" class="form-control" required placeholder="Enter First Name">
                                        </div>

                                    </div>

                                    <!--Last Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Last Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->last_name }}" name="last_name" class="form-control" placeholder="Enter Last Name">
                                        </div>

                                    </div>

                                    <!--Email-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Email
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="email" value="{{ $getRecord->email }}" name="email" class="form-control" placeholder="Enter Email" pattern="^[a-zA-Z0-9]+@hr-system\.[a-zA-z]+$" required >
                                            <span style="color: red">
                                            <!--Validation that if got same email-->
                                            {{ $errors->first('email') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--Phone Number-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Phone Number</label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->phone_number }}" name="phone_number" class="form-control" placeholder="Enter Phone Number">
                                            <span style="color: red">
                                            <!--Validation that if got same phone number-->
                                            {{ $errors->first('phone_number') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--Address-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Address</label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->address }}" name="address" class="form-control" placeholder="Enter Address">
                                            <span style="color: red">
                                        </span>
                                        </div>

                                    </div>

                                    <!--Role-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Role</label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="is_role">
                                                <option value="" disabled>Select Role / Permission</option>
                                                <option value="0">Employee</option>
                                                <option value="1">HR Admin</option>
                                            </select>
                                        </div>

                                    </div>

                                    <!--Hire Date-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Hire Date
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="date" value="{{ $getRecord->hire_date }}" name="hire_date" class="form-control" placeholder="Enter Hire Date" required>
                                        </div>

                                    </div>

                                    <!--Department ID-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Department
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="department_id" required>
                                                <option value="" disabled>Select Department</option>
                                                @foreach($getDepartment as $department)
                                                    <option {{ ($getRecord->department_id == $department->id) ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->department_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Position-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Position</label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="position_id" required>
                                                <option value="" disabled>Select Position</option>
                                                @foreach($getPosition as $position)
                                                    <option {{ ($getRecord->position_id == $position->id) ? 'selected' : '' }} value="{{ $position->id }}">{{ $position->position_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Manager ID-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Manager Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="manager_id" required>
                                                <option value="" disabled>Select Manager Name</option>
                                                @foreach($getManager as $manager)
                                                    @if(!($manager->id == $getRecord->id))
                                                        <option {{ ($getRecord->manager_id == $manager->id) ? 'selected' : '' }} value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Employee Category-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Category
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="category_employee" required>
                                                <option value="" disabled>Select Category</option>
                                                <option {{ ($getRecord->category_employee == 0) ? 'selected' : '' }} value="0">
                                                    Full Time
                                                </option>
                                                <option {{ ($getRecord->category_employee == 1) ? 'selected' : '' }} value="1">
                                                    Part Time
                                                </option>
                                                <option {{ ($getRecord->category_employee == 2) ? 'selected' : '' }} value="2">
                                                    Contract
                                                </option>
                                                <option {{ ($getRecord->category_employee == 3) ? 'selected' : '' }} value="3">
                                                    Temporary
                                                </option>
                                            </select>
                                        </div>

                                    </div>

                                    <!--Annual Leave Days-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Annual Leave Days
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->annual_leaveDays }}" name="annual_leaveDays" class="form-control" placeholder="Default: 8 Days" required>
                                        </div>

                                    </div>

                                    <!--Medical Leave Days-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Medical Leave Days
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->medical_leaveDays }}" name="medical_leaveDays" class="form-control" placeholder="Default: 14 Days" required>
                                        </div>

                                    </div>

                                    <!--Bank Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Bank Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="Maybank" name="bank_name" class="form-control" readonly>
                                        </div>

                                    </div>

                                    <!--Bank Account-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Bank Account
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->bank_acc }}" name="bank_acc" class="form-control" placeholder="Enter Bank Account" required>
                                        </div>

                                    </div>

                                    <!--EPF Number-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">EPF Number
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->epf_no }}" name="epf_no" class="form-control" placeholder="Enter EPF Number" required>
                                        </div>

                                    </div>

                                    <!--PCB Number-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">PCB Number
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->pcb_no }}" name="pcb_no" class="form-control" placeholder="Enter EPF Number" required>
                                        </div>

                                    </div>

                                    <!--IC Number-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">IC Number
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->ic_no }}" name="ic_no" class="form-control" placeholder="Enter EPF Number" required>
                                        </div>

                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <!--Back to List Button-->
                                        <a href=" {{ url('admin/employees') }} " class="btn btn-default"><i class="fa-solid fa-xmark mr-1"></i>Cancel</a>

                                        <!--Update Button-->
                                        <button type="submit" class="btn btn-primary float-right"><i class="fa-regular fa-pen-to-square mr-2"></i>Update</button>
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

    @section('script')
        <script>
            bsCustomFileInput.init();
        </script>
    @endsection

@endsection
