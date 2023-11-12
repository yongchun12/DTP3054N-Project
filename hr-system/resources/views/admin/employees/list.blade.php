<!--Table List Employees-->
@extends('layouts.plugins')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
                        <!--Excel Export-->
                        <a href="{{ url('admin/employee_export') }}" class="btn btn-success">Excel Export</a>

                        <!--Create Employee-->
                        <a href=" {{ url('admin/employees/create') }} " class="btn btn-primary"> Add Employees</a>
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

                        <div class="card">
                            <div class="card-header">

                                <h3 class="card-title">Search Employees</h3>

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
                                            <button class="btn btn-primary" type="submit" style="margin-top: 32px">
                                                Search
                                            </button>
                                            <a href="{{ url('admin/employees') }}" class="btn btn-secondary" style="margin-top: 30px">
                                                Reset
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="card">
                            <!--Title-->
                            <div class="card-header">
                                <h3 class="card-title">Employees List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">

                                    <thead>
                                    <!--tr is Table Row-->
                                        <tr>
                                            <th>Staff ID</th>
                                            <th>Profile Picture</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($getRecord as $value)
                                        <tr>
                                            <td style="vertical-align: middle;">{{ $value->staff_id }}</td>

                                            <!--Profile Picture-->
                                            <td>
                                                @if(!empty($value->profile_picture))
                                                    @if(file_exists(public_path('img/profile_picture/'.$value->profile_picture)))
                                                        <img src="{{ asset('img/profile_picture/'.$value->profile_picture) }}" width="50px" height="50px" style="vertical-align: middle;">
                                                    @endif
                                                @endif
                                            </td>

                                            <td style="vertical-align: middle;">{{ $value->name }}</td>
                                            <td style="vertical-align: middle;">{{ $value->last_name }}</td>
                                            <td style="vertical-align: middle;">{{ $value->email }}</td>

                                            <!--If is_role is not empty, define is HR or Employee-->
                                            <td style="vertical-align: middle;">{{ !empty($value->is_role) ? 'HR' : 'Employee' }}</td>

                                            <td style="vertical-align: middle;">
                                                <!--The Dot is for the link to check which id-->
                                                <a href="{{ url('admin/employees/view/' .$value->id) }}" class="btn btn-primary">View</a>

                                                <!--If the user is admin/HR is not allow to edit-->
                                                @if($value->is_role == 1)
                                                    <a class="btn btn-secondary" onclick="alert('Not allowed to edit Global Admin Details')">Edit</a>
                                                @else
                                                    <a href="{{ url('admin/employees/edit/' .$value->id) }}" class="btn btn-secondary">Edit</a>
                                                @endif

                                                @if($value->is_role == 1)
                                                    <a onclick="alert('Not allow to delete Global Admin Details')" class="btn btn-danger">Delete</a>
                                                @else
                                                    <a href="{{ url('admin/employees/delete/' .$value->id) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">Delete</a>
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
