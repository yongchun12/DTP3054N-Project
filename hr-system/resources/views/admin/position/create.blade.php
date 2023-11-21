<!--Create Payroll Record-->
@extends('layouts.plugins')

@section('title', 'Create Position')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Position</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/position') }}">Department</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active">Create Position</li>
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
                                    Create Position
                                </h3>
                            </div>

                            <!--Form-->
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!--Position Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Position Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">

                                            <input type="text" value="{{ old('position_name') }}" name="position_name"
                                                   class="form-control" required placeholder="Enter Position Name">
                                        </div>

                                    </div>

                                    <!--Position Description-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Position Description
                                        </label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="position_description" placeholder="Enter Description">{{ old('position_description') }}</textarea>
                                        </div>

                                    </div>

                                    <!--Manager Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Department
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="department_id" required>
                                                <option disabled selected value="">Select Department</option>
                                                @foreach($getDepartment as $getDept)
                                                        <option value="{{ $getDept->id }}">{{ $getDept->department_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/position') }} " class="btn btn-default"><i class="fa-solid fa-xmark mr-1"></i>Cancel</a>
                                        <button type="submit" class="btn btn-primary float-right"><i class="fa-solid fa-plus mr-1"></i>Create Position</button>
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
