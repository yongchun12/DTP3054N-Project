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

                            <form class="form-horizontal" method="post" accept="{{ url('admin/employees/create') }}}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!-- If want add column then copy this-->
                                    <!-- "name" should put the table column name-->

                                    <!--Profile Picture-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Profile Picture</label>

                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="profile_picture">
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

                                            <input type="text" value="{{ old('suffix_staffID') }}" name="suffix_staffID" id="suffix_staffID" class="form-control" aria-describedby="domain" placeholder="Enter Staff ID" oninput="passStaffID()" max="9999" required>
                                        </div>

                                        <!--Hidden Row / Get EMP- Value from JavaScript and pass this value to Controller-->
                                        <div class="col-sm-2">
                                            <input type="hidden" value="{{ old('staff_id') }}" name="staff_id" id="staff_id">
                                        </div>

                                        <div class="col-sm-10">
                                        <span style="color: red">
                                            <!--Validation that if got same email-->
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
                                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" required placeholder="Enter First Name">

                                        </div>

                                    </div>

                                    <!--Last Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Last Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control" placeholder="Enter Last Name">
                                        </div>

                                    </div>

                                    <!--Email-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Email
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <input type="text" value="{{ old('prefix_email') }}" name="prefix_email" id="prefix_email" oninput="passEmail()" class="form-control" placeholder="Enter Username" pattern="[a-zA-Z0-9]+" required>

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

                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
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

                                            <input type="number" value="{{ old('phone_number') }}" name="phone_number" class="form-control" placeholder="Enter Phone Number">
                                        </div>

                                        <div class="col-sm-2">
                                        </div>

                                        <div class="col-sm-10">
                                        <span style="color: red">
                                            <!--Validation that if got same email-->
                                            {{ $errors->first('phone_number') }}
                                        </span>
                                        </div>

                                    </div>

                                    <!--Address-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Address</label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('address') }}" name="address" class="form-control" placeholder="Enter Address">
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
                                            <input type="date" value="{{ old('hire_date') }}" name="hire_date" class="form-control" placeholder="Enter Hire Date" required>
                                        </div>

                                    </div>

                                    <!--Job ID / Position-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Position
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="job_id">
                                                <option value="" disabled>Select Job Title</option>
                                                <option value="1">Web Developer</option>
                                                <option value="2">Accountant</option>
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
                                            <select class="form-control" name="manager_id">
                                                <option value="" disabled>Select Manager Name</option>
                                                <option value="1">Yong Chun</option>
                                                <option value="2">Chee Yi</option>
                                            </select>
                                        </div>

                                    </div>

                                    <!--Department ID / Department Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Department
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="department_id">
                                                <option value="" disabled>Select Department</option>
                                                <option value="1">Project Department</option>
                                                <option value="2">Finance Department</option>
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
                                            <select class="form-control" name="category_employee">
                                                <option value="" disabled>Select Category</option>
                                                <option value="0">Full Time</option>
                                                <option value="1">Part Time</option>
                                                <option value="2">Contract</option>
                                                <option value="3">Temporary</option>
                                            </select>
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
                                            <input type="text" value="{{ old('bank_acc') }}" name="bank_acc" class="form-control" placeholder="Enter Bank Account" required>
                                            <span style="color: red">
                                            <!--Validation that if got same phone number-->
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
                                            <input type="text" value="{{ old('ic_no') }}" name="ic_no" class="form-control" placeholder="Enter IC Number" required>
                                            <span style="color: red">
                                            <!--Validation that if got same phone number-->
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
                                            <input type="text" value="{{ old('epf_no') }}" name="epf_no" class="form-control" placeholder="Enter EPF Number" required>
                                            <span style="color: red">
                                            <!--Validation that if got same phone number-->
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
                                            <input type="text" value="{{ old('pcb_no') }}" name="pcb_no" class="form-control" placeholder="Enter PCB Number" required>
                                            <span style="color: red">
                                            <!--Validation that if got same phone number-->
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
        </script>

    @endsection

@endsection
