@extends('layouts.plugins')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href=" {{ url('admin/dashboard') }} ">Dashboard</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <!--Total Employee-->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ !empty($getEmployeeCount) ? $getEmployeeCount : '0' }}</h3>

                                <p>Total Employees</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="{{ url('admin/employees') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!--Total Pending Leave Application-->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ !empty($getPendingLeaveCount) ? $getPendingLeaveCount : '0' }}</h3>

                                <p>Pending Leave</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            <a href="{{ url('admin/leave/pending') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!--Total Leave Application-->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ !empty($getTotalLeaveCount) ? $getTotalLeaveCount : '0' }}</h3>

                                <p>Total Leave Approval</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            <a href="{{ url('admin/leave/history') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!--Total Forum Topic-->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ !empty($getTotalForumCount) ? $getTotalForumCount : '0' }}</h3>

                                <p>Total Topic</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-comment"></i>
                            </div>
                            <a href="{{ url('admin/forum') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
                </div>


                <!-- Main row -->

                <!--Recent Created Employees-->
                <div class="row">
                    <!--Recent Created Forum Topic-->

                    <section class="col-lg-5 connectedSortable">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">
                                    <i class="fa-regular fa-clone mr-1"></i>
                                    Recent Posts by You
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body pt-0">
                                @forelse($getPosts as $data)
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body" style="padding-bottom: 0.5em">
                                                <div class="tab-content">
                                                    <div class="active tab-pane">

                                                        <div class="post">
                                                            <div class="user-block">
                                                                <!--Profile Picture-->
                                                                @if(!empty($data->profile_picture))
                                                                    @if(file_exists(public_path('img/profile_picture/'.$data->profile_picture)))
                                                                        <img src="{{ asset('img/profile_picture/'.$data->profile_picture) }}" class="img-circle img-bordered-sm">
                                                                    @endif
                                                                @endif

                                                                <!--Name-->
                                                                <span class="username">
                                                            <a>{{ $data->name }}</a>
                                                        </span>

                                                                <span class="description">
                                                            {{ $data->created_at->diffForHumans() }}
                                                        </span>
                                                            </div>

                                                            <p>
                                                                <strong style="font-size: 16px">Topic: {{ $data->title }}</strong>
                                                                <br>
                                                                {{ $data->description }}
                                                            </p>

                                                            <!--Action-->
                                                            <p>

                                                                <!--Edit-->
                                                                @if($data->employee_id == Auth::user()->id)
                                                                    <a href="{{ url('admin/forum/edit/'.$data->id) }}">
                                                                        <button type="button" class="btn btn-default btn-sm">
                                                                            <i class="fa-regular fa-pen-to-square" style="margin-right: 5px;"></i>
                                                                            Edit
                                                                        </button>
                                                                    </a>
                                                                @else
                                                                    <a onclick="(alert('You are not allow to edit'))">
                                                                        <button type="button" class="btn btn-default btn-sm">
                                                                            <i class="fa-regular fa-pen-to-square" style="margin-right: 5px;"></i>
                                                                            Edit
                                                                        </button>
                                                                    </a>
                                                                @endif

                                                                <!--Delete-->
                                                                @if($data->employee_id == Auth::user()->id)
                                                                    <a href="{{ url('admin/forum/delete/'.$data->id) }}" onclick="return confirm('Are you sure want to delete?')">
                                                                        <button style="margin-left: 5px;" type="button" class="btn btn-default btn-sm">
                                                                            <i class="fa-solid fa-trash" style="margin-right: 5px;"></i>
                                                                            Delete
                                                                        </button>
                                                                    </a>
                                                                @else
                                                                    <a onclick="(alert('You are not allow to delete'))">
                                                                        <button style="margin-left:5px;" type="button" class="btn btn-default btn-sm">
                                                                            <i class="fa-solid fa-trash" style="margin-right: 5px;"></i>
                                                                            Delete
                                                                        </button>
                                                                    </a>
                                                                @endif

                                                                <span class="float-right">

                                                            <!--Show Comments-->
                                                            <a href="{{ url('admin/forum/view/'.$data->id) }}">
                                                                <button style="margin-left:5px;" type="button" class="btn btn-default btn-sm">
                                                                    <i class="far fa-comments" style="margin-right: 5px;"></i>
                                                                        Comments ({{ $getTopicReplyCount[$data->id] }})
                                                                </button>
                                                            </a>
                                                        </span>

                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                @empty
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <strong>
                                                No Topic yet. Be the first to create one!
                                            </strong>
                                        </div>
                                    </div>

                                @endforelse
                            </div>

                            <div class="card-footer clearfix">
                                <a href="{{ url('admin/forum/posts/create') }}" class="btn btn-sm btn-info float-left"><i class="fa-solid fa-plus mr-1"></i>Topic Create</a>
                                <a href="{{ url('admin/employee') }}" class="btn btn-sm btn-secondary float-right"><i class="fa-solid fa-table mr-1"></i>View All Topic</a>
                            </div>

                        </div>
                    </section>

                    <!--Recent Created Employees-->
                    <section class="col-lg-7 connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa-solid fa-clock-rotate-left mr-1"></i>
                                    Recent Created Employees
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>Staff ID</th>
                                            <th>Profile Picture</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getEmployeeRecord as $employee)

                                                <tr>
                                                    <td style="vertical-align: middle;">{{ $employee->staff_id }}</td>
                                                    <td>
                                                        @if(!empty($employee->profile_picture))
                                                            @if(file_exists(public_path('img/profile_picture/'.$employee->profile_picture)))
                                                                <img src="{{ asset('img/profile_picture/'.$employee->profile_picture) }}" width="50px" height="50px" style="vertical-align: middle;">
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td style="vertical-align: middle;">{{ $employee->name }}</td>
                                                    <td style="vertical-align: middle;">{{ $employee->email }}</td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="card-footer clearfix">
                                <a href="{{ url('admin/employees/create') }}" class="btn btn-sm btn-primary float-left"><i class="fa-solid fa-plus mr-1"></i>Create New Employees</a>
                                <a href="{{ url('admin/employees') }}" class="btn btn-sm btn-secondary float-right"><i class="fa-solid fa-table mr-1"></i>View All Employees</a>
                            </div>

                        </div>
                    </section>

                </div>

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
