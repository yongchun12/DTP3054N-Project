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
                        <h1 class="m-0">My Account</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">My Account</a></li>
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

                        <!--Alert Message-->
                        @include('layouts.alert_message')

                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title"><i class="fa-solid fa-gear mr-2"></i>My Account</h3>
                            </div>

                            <form class='form-horizontal' method="post" action="{{ url('admin/my_account/update') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!--Profile Picture-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Profile Picture</label>

                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="profile_picture">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>

                                            <br><br>

                                            <!--If no profile picture it will not show-->
                                            @if(!empty($getRecord->profile_picture))
                                                @if(file_exists(public_path('img/profile_picture/'.$getRecord->profile_picture)))
                                                    <img src="{{ asset('img/profile_picture/'.$getRecord->profile_picture) }}" width="50px" height="50px" style="vertical-align: middle;">
                                                @endif
                                            @endif

                                        </div>

                                    </div>

                                    <!--First Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">First Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->name }}" name="name"
                                                   class="form-control" required placeholder="Enter First Name">
                                        </div>

                                    </div>

                                    <!--Last Name-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Last Name
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->last_name }}" name="last_name"
                                                   class="form-control" required placeholder="Enter Last Name">
                                        </div>

                                    </div>

                                    <!--Password-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Password
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('password') }}" name="password"
                                                   class="form-control" placeholder="Enter Password">
                                            (Leave blank if you are not changing the password)
                                        </div>

                                    </div>

                                    <!--Card Footer-->
                                    <div class="card-footer">
                                        <a href=" {{ url('admin/dashboard') }} " class="btn btn-default"><i class="fa-solid fa-arrow-left mr-1"></i>Back</a>
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

    <!--Custom File Input-->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

    <script>
        bsCustomFileInput.init();
    </script>

@endsection
