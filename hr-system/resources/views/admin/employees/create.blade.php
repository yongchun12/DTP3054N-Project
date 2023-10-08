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
                        <h1 class="m-0">Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Employees</li>
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
                        <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title">Create Employees</h3>
                        </div>

                        <form class="form-horizontal" method="post" accept="{{ url('admin/employees/create') }}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="card-body">

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
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" required placeholder="Enter First Name">
                                    </div>

                                </div>

                                <!--Last Name-->
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">Last Name</label>

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

                                    <div class="col-sm-10">
                                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Enter Email" required>
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

                                    <label class="col-sm-2 col-form-label">Phone Number</label>

                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('phone_number') }}" name="phone_number" class="form-control" placeholder="Enter Phone Number">
                                        <span style="color: red">
                                            <!--Validation that if got same email-->
                                            {{ $errors->first('phone_number') }}
                                        </span>
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

                                <!--Job ID-->
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">Job ID</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="job_id">
                                            <option value="">Select Job Title</option>
                                                <option value="1">Web Developer</option>
                                                <option value="2">Accountant</option>
                                        </select>
                                    </div>

                                </div>

                                <!--Salary-->
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">Salary
                                        <!--Required-->
                                        <span style="color: red">*</span>
                                    </label>

                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('salary') }}" name="salary" class="form-control" placeholder="Enter Salary" required>
                                        <span style="color: red">
                                            <!--Validation that if got same email-->
                                            {{ $errors->first('salary') }}
                                        </span>
                                    </div>

                                </div>

                                <!--Commission-->
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">Commission
                                        <!--Required-->
                                        <span style="color: red">*</span>
                                    </label>

                                    <div class="col-sm-10">
                                        <input type="number" value="{{ old('commission') }}" name="commission" class="form-control" placeholder="Enter Commission" required>
                                        <span style="color: red">
                                            <!--Validation that if got same email-->
                                            {{ $errors->first('commission') }}
                                        </span>
                                    </div>

                                </div>

                                <!--Manager ID-->
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">Manager Name
                                        <!--Required-->
                                        <span style="color: red">*</span>
                                    </label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="manager_id">
                                            <option value="">Select Manager Name</option>
                                            <option value="1">Yong Chun</option>
                                            <option value="2">Chee Yi</option>
                                        </select>
                                    </div>

                                </div>

                                <!--Department ID-->
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">Department
                                        <!--Required-->
                                        <span style="color: red">*</span>
                                    </label>

                                    <div class="col-sm-10">
                                        <select class="form-control" name="department_id">
                                            <option value="">Select Department</option>
                                            <option value="1">Project Department</option>
                                            <option value="2">Finance Department</option>
                                        </select>
                                    </div>

                                </div>

                                <!--Card Footer-->
                                <div class="card-footer">
                                    <a href=" {{ url('admin/employees') }} " class="btn btn-default">Cancel</a>
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
