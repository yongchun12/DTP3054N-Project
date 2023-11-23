<!--Create Employees-->
@extends('layouts.plugins')

@section('title', 'Change Profile Picture')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Change Profile Picture</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
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
                                <h3 class="card-title"><i class="fa-regular fa-id-badge mr-2"></i>Change Profile Picture</h3>
                            </div>

                            <form class='form-horizontal' method="post" action="{{ url('admin/change_profile_picture/update') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!--Profile Picture-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Profile Picture</label>

                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="profile_picture" accept="image/*">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>

                                            <br><br>

                                            <!--If no profile picture it will not show-->
                                            @if(!empty(Auth::user()->profile_picture))
                                                @if(file_exists(public_path('img/profile_picture/'.Auth::user()->profile_picture)))
                                                    <img src="{{ asset('img/profile_picture/'.Auth::user()->profile_picture) }}" width="50px" height="50px" style="vertical-align: middle;">
                                                @endif
                                            @endif

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

    @section('script')
        <script>
            $(document).ready(function () {
                bsCustomFileInput.init();
            });
        </script>
    @endsection

@endsection
