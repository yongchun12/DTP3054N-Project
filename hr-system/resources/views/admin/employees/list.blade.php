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
                                            <input type="text" value="{{ Request()->staff_id }}" name="id" class="form-control" placeholder="Staff ID">
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
                                            <input type="email" value="{{ Request()->email }}" name="email" class="form-control" placeholder="Email">
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

                        <!--Alert Message-->
                        @include('layouts.alert_message')

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
                                            <td>{{ $value->staff_id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->last_name }}</td>
                                            <td>{{ $value->email }}</td>

                                            <!--If is_role is not empty, define is HR or Employee-->
                                            <td>{{ !empty($value->is_role) ? 'HR' : 'Employee' }}</td>

                                            <td>
                                                <!--The Dot is for the link to check which id-->
                                                <a href="{{ url('admin/employees/view/' .$value->id) }}" class="btn btn-primary">View</a>
                                                <a href="{{ url('admin/employees/edit/' .$value->id) }}" class="btn btn-secondary">Edit</a>
                                                <a href="{{ url('admin/employees/delete/' .$value->id) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">Delete</a>
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
