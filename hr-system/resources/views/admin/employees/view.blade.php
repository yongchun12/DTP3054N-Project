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
                            <li class="breadcrumb-item">Employees</li>
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

                                    <!--ID-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ID</label>

                                        <div class="col-sm-10">
                                            {{ $getRecord->id }}
                                        </div>
                                    </div>

                                    <!--First Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Name</label>

                                        <div class="col-sm-10">
                                            {{ $getRecord->name }}
                                        </div>

                                    </div>

                                    <!--Last Name-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Name</label>

                                        <div class="col-sm-10">
                                            {{ $getRecord->last_name }}
                                        </div>

                                    </div>

                                    <!--Email-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>

                                        <div class="col-sm-10">
                                            {{ $getRecord->email }}
                                        </div>

                                    </div>

                                    <!--Phone Number-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number</label>

                                        <div class="col-sm-10">
                                            {{ $getRecord->phone_number }}
                                        </div>

                                    </div>

                                    <!--Hire Date-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hire Date</label>

                                        <div class="col-sm-10">
                                            <!--Change Date Format-->
                                            {{ date('d-F-Y', strtotime($getRecord->hire_date)) }}
                                        </div>

                                    </div>

{{--                                    <!--Position-->--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-2 col-form-label">Position</label>--}}

{{--                                        <div class="col-sm-10">--}}
{{--                                            {{ $getRecord->job_id }}--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

                                    <!--Salary-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Salary</label>

                                        <div class="col-sm-10">
                                            {{ $getRecord->salary }}
                                        </div>

                                    </div>

                                    <!--Commission-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Commission</label>

                                        <div class="col-sm-10">
                                            {{ $getRecord->commission }}
                                        </div>

                                    </div>

{{--                                    <!--Manager ID-->--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-2 col-form-label">Manager Name</label>--}}

{{--                                        <div class="col-sm-10">--}}
{{--                                            {{ $getRecord->manager_id }}--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

{{--                                    <!--Department ID-->--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-2 col-form-label">Department</label>--}}

{{--                                        <div class="col-sm-10">--}}
{{--                                            {{ $getRecord->department_id }}--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

                                    <!--Role Access-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Role</label>

                                        <div class="col-sm-10">
                                            {{ !empty($getRecord->is_role) ? 'HR' : 'Employee'}}
                                        </div>

                                    </div>

                                    <!--Created Date-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Created Date</label>

                                        <div class="col-sm-10">
                                            {{ date('d-F-Y H:i A', strtotime($getRecord->created_at)) }}
                                        </div>

                                    </div>

                                    <!--Last Updated-->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Updated</label>

                                        <div class="col-sm-10">
                                            {{ date('d-F-Y H:i A', strtotime($getRecord->updated_at)) }}
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
