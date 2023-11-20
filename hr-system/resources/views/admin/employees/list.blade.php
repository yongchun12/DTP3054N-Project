<!--Table List Employees-->
@extends('layouts.plugins')

@section('title', 'Employees List')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Employees
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
                        <!--Excel Export-->
                        <a href="{{ url('admin/employee_export') }}" class="btn btn-success">
                            <i class="fa-regular fa-file-excel mr-1"></i>
                            Excel Export
                        </a>

                        <!--Create Employee-->
                        <a href=" {{ url('admin/employees/create') }} " class="btn btn-primary" style="margin-left: 5px;">
                            <i class="fa-solid fa-plus mr-1"></i>
                            Add Employees
                        </a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Employee List-->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-lg-12">

                        <!--Alert Message-->
                        @include('layouts.alert_message')

                        <div class="card card-outline card-primary">
                            <div class="card-header">

                                <h3 class="card-title">
                                    <i class="fa-solid fa-magnifying-glass mr-1"></i>
                                    Search Employees
                                </h3>

                            </div>

                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <!--Search-->
                                        <!--ID-->
                                        <div class="form-group col-md-1">
                                            <label>Staff ID</label>
                                            <input type="text" value="{{ Request()->staff_id }}" name="staff_id" class="form-control" placeholder="Staff ID">
                                        </div>

                                        <!--First Name-->
                                        <div class="form-group col-md-3">
                                            <label>First Name</label>
                                            <input type="text" value="{{ Request()->name }}" name="name" class="form-control" placeholder="First Name">
                                        </div>

                                        <!--Last Name-->
                                        <div class="form-group col-md-3">
                                            <label>Last Name</label>
                                            <input type="text" value="{{ Request()->last_name }}" name="last_name" class="form-control" placeholder="Last Name">
                                        </div>

                                        <!--Last Name-->
                                        <div class="form-group col-md-3">
                                            <label>Email</label>
                                            <input type="text" value="{{ Request()->email }}" name="email" class="form-control" placeholder="Email">
                                        </div>

                                        <!--Search Button-->
                                        <div class="form-group col-md-2">

                                            <!--Search Button-->
                                            <button class="btn btn-primary" type="submit" style="margin-top: 32px">
                                                <i class="fa-solid fa-magnifying-glass mr-1"></i>
                                                Search
                                            </button>

                                            <!--Reset Button-->
                                            <a href="{{ url('admin/employees') }}">
                                                <button class="btn btn-secondary" style="margin-top: 32px; margin-left: 5px;" type="button">
                                                    <i class="fa-solid fa-rotate"></i>
                                                    Reset
                                                </button>
                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="card">
                            <!--Title-->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa-solid fa-list mr-1"></i>
                                    Employees List
                                </h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">

                                    <thead>
                                    <!--tr is Table Row-->
                                        <tr>
                                            <th style="text-align: center">Staff ID</th>
                                            <th style="text-align: center">Profile Picture</th>
                                            <th style="text-align: center">First Name</th>
                                            <th style="text-align: center">Last Name</th>
                                            <th style="text-align: center">Email</th>
                                            <th style="text-align: center">Role</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($getRecord as $value)
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center;">{{ $value->staff_id }}</td>

                                            <!--Profile Picture-->
                                            <td style="vertical-align: middle; text-align: center;">
                                                @if(!empty($value->profile_picture))
                                                    @if(file_exists(public_path('img/profile_picture/'.$value->profile_picture)))
                                                        <img src="{{ asset('img/profile_picture/'.$value->profile_picture) }}" width="50px" height="50px" style="vertical-align: middle;">
                                                    @endif
                                                @endif
                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">{{ $value->name }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $value->last_name }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $value->email }}</td>

                                            <!--If is_role is not empty, define is HR or Employee-->
                                            <!--Global Admin allow to do anything, but not edit own details, if want to edit own details, need to be edit in database-->
                                            <!--Note:
                                                - For HR, admin account and their own hr account is not same, since for security purpose
                                            -->

                                            <td style="vertical-align: middle; text-align: center;">
                                                @if(!empty($value->is_role) && $value->email == "admin@hr-system.com")
                                                    Global Admin
                                                @elseif(!empty($value->is_role))
                                                    HR
                                                @else
                                                    Employee
                                                @endif
                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">

                                                <!--The Dot is for the link to check which id-->
                                                <!--View Employee Details-->
                                                <a href="{{ url('admin/employees/view/' .$value->id) }}" class="btn btn-outline-primary">
                                                    <i class="fa-regular fa-file-lines mr-1"></i>
                                                    View
                                                </a>

                                                <!--If the user is admin/HR is not allow to edit-->
                                                <!--If the user is global admin (Detect by the email) or Current Login user is same with the id that display,
                                                that is not allowed to do anything-->

                                                @if(Auth::user()->id == $value->id || $value->email == "admin@hr-system.com")
                                                    <a class="btn btn-outline-secondary" onclick="alert('Not allowed to edit Global Admin / Own Admin Details')" style="margin-left: 5px;">
                                                        <i class="fa-regular fa-pen-to-square mr-1"></i>
                                                        Edit
                                                    </a>
                                                @else
                                                    <!--Allow to edit-->
                                                    <a href="{{ url('admin/employees/edit/' .$value->id) }}" class="btn btn-outline-secondary" style="margin-left: 5px;">
                                                        <i class="fa-regular fa-pen-to-square mr-1"></i>
                                                        Edit
                                                    </a>
                                                @endif

                                                @if(Auth::user()->id == $value->id || $value->email == "admin@hr-system.com")
                                                    <a onclick="alert('Not allow to delete Global Admin / Own Admin Details')" class="btn btn-outline-danger" style="margin-left: 5px;">
                                                        <i class="fa-regular fa-trash-can mr-1"></i>
                                                        Delete
                                                    </a>
                                                @else
                                                    <!--Allow to delete-->
                                                    <a href="{{ url('admin/employees/delete/' .$value->id) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-outline-danger" style="margin-left: 5px;">
                                                        <i class="fa-regular fa-trash-can mr-1"></i>
                                                        Delete
                                                    </a>
                                                @endif

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" style="text-align: center">No Record Found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>

                                </table>

                                <div style="padding: 10px; float: right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>

                            </div>
                        </div>

                    </section>
                </div>

            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
