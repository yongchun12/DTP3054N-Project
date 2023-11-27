<!--Change Password-->
@extends('layouts.plugins')

@section('title', 'Change Password')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Change Password</h1>
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
                                <h3 class="card-title"><i class="fa-solid fa-lock mr-2"></i>Change Password</h3>
                            </div>

                            <form class='form-horizontal' method="post" action="{{ url('employee/change_password/update') }}" enctype="multipart/form-data" id="pic_form">
                                {{ csrf_field() }}

                                <div class="card-body">

                                    <!--Password-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Password
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <input type="password" value="{{ old('password') }}" name="password" id="password"
                                                   class="form-control" placeholder="Enter Password" required
                                                   pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&]).{8,}"
                                                   oninvalid="toastr.error('Please use the format with 1 Uppercase, 1 Lowercase, 1 Number and 1 Special Character.')">

                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="password_show_hide()" style="cursor: pointer">
                                                    <i class="fa-solid fa-eye-slash" id="hide_eye"></i>
                                                    <i class="fa-solid fa-eye d-none" id="show_eye"></i>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                    <!--Confirm Password-->
                                    <div class="form-group row">

                                        <label class="col-sm-2 col-form-label">Confirm Password
                                            <!--Required-->
                                            <span style="color: red">*</span>
                                        </label>

                                        <div class="col-sm-10 input-group">
                                            <input type="password" id="confirm_password"
                                                   class="form-control" placeholder="Confirm Password">

                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="confirm_password_show_hide()" style="cursor: pointer">
                                                    <i class="fa-solid fa-eye-slash" id="hide_eye"></i>
                                                    <i class="fa-solid fa-eye d-none" id="show_eye"></i>
                                                </span>
                                            </div>
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
            //Confirm Password Validation
            $(document).ready(function () {
                $('#password, #confirm_password').on('keyup', function () {
                    if ($('#password').val() == $('#confirm_password').val()) {
                        $('#confirm_password').css('border-color', 'green');
                    } else {
                        $('#confirm_password').css('border-color', 'red');
                    }
                });

                // Assuming your form has an ID 'myForm'
                $('#pic_form').on('submit', function (event) {
                    if ($('#password').val() != $('#confirm_password').val()) {
                        event.preventDefault(); // Prevent form submission

                        toastr.error('Passwords do not match.');

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                });
            });
        </script>
    @endsection

@endsection
