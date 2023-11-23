<!--Create Payroll Record-->
@extends('layouts.plugins')

@section('title', 'Create Department')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Department</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/department') }}">Department</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active">Create Department</li>
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

                            <!--Header-->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa-solid fa-plus mr-1"></i>
                                    Create Department
                                </h3>
                            </div>

                            <!--Form-->
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!--Department Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Department Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">

                                            <input type="text" value="{{ old('department_name') }}" name="department_name"
                                                   class="form-control" required placeholder="Enter Department Name">
                                        </div>

                                    </div>

                                    <!--Department Description-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Department Description
                                        </label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="department_description" placeholder="Enter Description">{{ old('department_description') }}</textarea>
                                        </div>

                                    </div>

                                    <!--Manager Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Manager Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="manager_id">
                                                <option disabled value="">Select Manager Name</option>
                                                @foreach($getEmployee as $getUser)
                                                        <option value="{{ $getUser->id }}">{{ $getUser->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/department') }} " class="btn btn-default"><i class="fa-solid fa-xmark mr-1"></i>Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-plus mr-1"></i>Create Department</button>
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
