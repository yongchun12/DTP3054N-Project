<!--Edit Department-->
@extends('layouts.plugins')

@section('title', 'Edit Department Record')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit Department Record</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/department') }}">Department</a></li>
                            <!--Edit Breadcrumb Name-->
                            <li class="breadcrumb-item active"><a href="#">Edit Department Record</a></li>
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
                                    <i class="fa-regular fa-pen-to-square mr-1"></i>
                                    Edit Department Record
                                </h3>
                            </div>

                            <!--Form-->
                            <form class="form-horizontal" method="post" accept="{{ url('admin/department/edit/'.$getRecord->id) }}}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!--Card Body-->
                                <div class="card-body">

                                        <!--Department Name-->
                                        <div class="form-group row">

                                            <label class="col-sm-2 col-form-label">Department Name
                                                <!--Required-->
                                                <span style="color: red">*</span>
                                            </label>

                                            <div class="col-sm-10">

                                                <input type="text" value="{{ $getRecord->department_name }}" name="department_name"
                                                       class="form-control" required placeholder="Enter Department Name">
                                            </div>

                                        </div>

                                        <!--Department Description-->
                                        <div class="form-group row">

                                            <label class="col-sm-2 col-form-label">Department Description
                                            </label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="department_description" placeholder="Enter Description">{{ $getRecord->department_description }}</textarea>
                                            </div>

                                        </div>

                                        <!--Manager Name-->
                                        <div class="form-group row">

                                            <label class="col-sm-2 col-form-label">Manager Name
                                                <!--Required-->
                                                <span style="color: red">*</span>
                                            </label>

                                            <div class="col-sm-10">
                                                <select class="form-control" name="manager_id" required>
                                                    <option disabled selected value="">Select Manager Name</option>
                                                    @foreach($getEmployee as $getUser)
                                                        @if(!($getUser->email == "admin@hr-system.com"))
                                                            <option {{ ($getUser->id == $getRecord->manager_id) ? 'selected' : '' }} value="{{ $getUser->id }}">{{ $getUser->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/department') }} " class="btn btn-default"><i class="fa-solid fa-xmark mr-1"></i>Cancel</a>
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

@endsection
