<!--Create Employees-->
@extends('layouts.plugins')

@section('title', 'Create Employees')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Create Employees
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/employees') }}">Employees</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active"><a href="#">Create Employees</a></li>
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
                                    <i class="fa-solid fa-plus mr-1"></i>
                                    Create Employees
                                </h3>
                            </div>

                            <form class="form-horizontal" method="post" action="{{ url('admin/employees/create') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!-- If want add column then copy this-->
                                    <!-- "name" should put the table column name-->

                                    <!--Profile Picture-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Profile Picture</label>

                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="profile_picture" accept="image/*">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>

                                    </div>

                                    <!--Staff ID-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Staff ID
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">EMP-</span>
                                            </div>

                                            <input type="text" value="{{ old('suffix_staffID') }}" name="suffix_staffID" id="suffix_staffID" class="form-control" aria-describedby="domain" placeholder="Enter Staff ID" oninput="passStaffID()" minlength="4" maxlength="4" required>
                                        </div>

                                        <!--Hidden Row / Get EMP- Value from JavaScript and pass this value to Controller-->
                                        <div class="col-sm-2">
                                            <input type="hidden" value="{{ old('staff_id') }}" name="staff_id" id="staff_id">
                                        </div>

                                        <div class="col-sm-10">
                                        <span style="color: red">
                                            <!--Validation that if got same staff id-->
                                            {{ $errors->first('staff_id') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--First Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">First Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <!--value: old is validation for check the type of the input-->
                                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Enter First Name" maxlength="64" required>

                                        </div>

                                    </div>

                                    <!--Last Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Last Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control" placeholder="Enter Last Name" maxlength="64" required>
                                        </div>

                                    </div>

                                    <!--Email-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Email
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <input type="text" value="{{ old('prefix_email') }}" name="prefix_email" id="prefix_email" oninput="passEmail()" class="form-control" placeholder="Enter Username"
                                                   pattern="[a-zA-Z0-9]+"
                                                   maxlength="50"
                                                   required>

                                            <div class="input-group-append">
                                                <span class="input-group-text">@hr-system.com</span>
                                            </div>
                                        </div>

                                        <!--Hidden Row-->
                                        <div class="col-sm-2">
                                            <!--Get the suffix Value from JavaScript and pass this value to Controller-->
                                            <input type="hidden" value="{{ old('email') }}" name="email" id="email">
                                        </div>

                                        <div class="col-sm-10">
                                        <span style="color: red">
                                            <!--Validation that if got same email-->
                                            {{ $errors->first('email') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--Password-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Password
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password"
                                                   pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&]).{8,}"
                                                   oninput="this.setCustomValidity('')"
                                                   oninvalid="this.setCustomValidity('Please use the format with 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.')"
                                                   required>

                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="password_show_hide()" style="cursor: pointer">
                                                    <i class="fa-solid fa-eye-slash" id="hide_eye"></i>
                                                    <i class="fa-solid fa-eye d-none" id="show_eye"></i>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                    <!--Phone Number-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Phone Number
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                            </div>

                                            <input type="number" value="{{ old('phone_number') }}" name="phone_number" class="form-control" placeholder="Enter Phone Number" maxlength="20" required>
                                        </div>

                                        <div class="col-sm-2">
                                        </div>

                                        <div class="col-sm-10">
                                        <span style="color: red">
                                            <!--Validation that if got same phone_number-->
                                            {{ $errors->first('phone_number') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--Address-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Address</label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('address') }}" name="address" class="form-control" placeholder="Enter Address" maxlength="100" required>
                                            <span style="color: red">
                                        </span>
                                        </div>

                                    </div>

                                    <!--Role-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Role</label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="is_role" required>
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
                                            <input type="date" value="{{ old('hire_date') }}" name="hire_date" class="form-control" placeholder="Enter Hire Date" required>
                                        </div>

                                    </div>

                                    <!--Department ID / Department Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Department
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="department_id" required>
                                                <option value="" disabled>Select Department</option>
                                                @foreach($getDepartment as $department)
                                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Position Id-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Position
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="position_id" required>
                                                <option value="" disabled>Select Position</option>
                                                @foreach($getPosition as $position)
                                                    <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Manager ID / Manager Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Manager Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="manager_id" required>
                                                <option value="" disabled>Select Manager Name</option>
                                                @foreach($getManager as $manager)
                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
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
                                                <option value="0">Full Time</option>
                                                <option value="1">Part Time</option>
                                                <option value="2">Contract</option>
                                                <option value="3">Temporary</option>
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
                                            <input type="number" value="{{ old('annual_leaveDays') }}" name="annual_leaveDays" class="form-control" placeholder="Default: 8 Days" max="24" maxlength="2" required>
                                        </div>

                                    </div>

                                    <!--Medical Leave Days-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Medical Leave Days
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('medical_leaveDays') }}" name="medical_leaveDays" class="form-control" placeholder="Default: 14 Days" max="60" maxlength="2" required>
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
                                            <input type="number" value="{{ old('bank_acc') }}" name="bank_acc" class="form-control" placeholder="Enter Bank Account" maxlength="16" required>
                                            <span style="color: red">
                                            <!--Validation that if got same bank_acc-->
                                            {{ $errors->first('bank_acc') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--IC Number-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">IC Number
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('ic_no') }}" name="ic_no" class="form-control" placeholder="Enter IC Number. Example: 030101070125" maxlength="12" required>
                                            <span style="color: red">
                                            <!--Validation that if got same ic_no-->
                                            {{ $errors->first('ic_no') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--EPF Number-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">EPF Number
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('epf_no') }}" name="epf_no" class="form-control" placeholder="Enter EPF Number" maxlength="12" required>
                                            <span style="color: red">
                                            <!--Validation that if got same epf_no-->
                                            {{ $errors->first('epf_no') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--PCB Number-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">PCB Number
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('pcb_no') }}" name="pcb_no" class="form-control" placeholder="Enter PCB Number" maxlength="14" required>
                                            <span style="color: red">
                                            <!--Validation that if got same pcb_no-->
                                            {{ $errors->first('pcb_no') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/employees') }} " class="btn btn-default"><i class="fa-solid fa-xmark mr-1"></i>Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-plus mr-1"></i>Create Employee</button>
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

            // Make sure the input value (type=number) is not exceed the max length
            document.querySelectorAll('input[type="number"]').forEach(input =>
                input.oninput = () => {
                    // "Replace all commas and dots"
                    if(input.value.length > input.maxLength) {
                        input.value = input.value.slice(0, input.maxLength)
                    }
                }
            );
        </script>

    @endsection

@endsection
