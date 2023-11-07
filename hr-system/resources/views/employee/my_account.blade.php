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

                        <div class="card card-info">

                            <div class="card-header">
                                <h3 class="card-title">My Account</h3>
                            </div>

                            <form class='form-horizontal' method="post" action="{{ url('employee/my_account/update') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!--Profile Picture-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Profile Picture</label>

                                        <div class="col-sm-10">
                                            <input type="file" name="profile_picture" class="form-control">

                                            <br>

                                            <!--If no profile picture it will not show-->
                                            @if(!empty($getRecord->profile_picture))
                                                @if(file_exists(public_path('img/profile_picture/'.$getRecord->profile_picture)))
                                                    <img src="{{ asset('img/profile_picture/'.$getRecord->profile_picture) }}" width="50px" height="50px" style="vertical-align: middle;">
                                                @endif
                                            @endif

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
                                        <a href=" {{ url('employee/dashboard') }} " class="btn btn-default">Back</a>
                                        <button type="submit" class="btn btn-primary float-right">Update</button>
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
