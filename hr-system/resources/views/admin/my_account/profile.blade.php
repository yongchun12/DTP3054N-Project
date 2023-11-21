<!--Leave Request-->
@extends('layouts.plugins')

@section('title', 'Profile')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <!--Profile Picture-->
                                <div class="text-center">
                                    @if(Auth::user()->profile_picture)
                                        <img src="{{ asset('img/profile_picture/'.Auth::user()->profile_picture) }}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                                    @endif
                                </div>

                                <!--Name-->
                                <h3 class="profile-username text-center">
                                    {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                                </h3>

                                <!--Role-->
                                <p class="text-muted text-center">
                                    @if(!empty(Auth::user()->is_role) && Auth::user()->email == "admin@hr-system.com")
                                        Global Admin
                                    @elseif(!empty(Auth::user()->is_role))
                                        HR
                                    @else
                                        Employee
                                    @endif
                                </p>

                            </div>

                        </div>


                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>

                            <div class="card-body">

                                <!--Status-->
                                <strong><i class="fa-brands fa-creative-commons-nd mr-1"></i> Status</strong>
                                <p class="text-muted">
                                    @if(Auth::user()->category_employee == 0)
                                        Full Time
                                    @elseif(Auth::user()->category_employee == 1)
                                        Part Time
                                    @elseif(Auth::user()->category_employee == 2)
                                        Contract
                                    @elseif(Auth::user()->category_employee == 3)
                                        Temporary
                                    @endif
                                </p>

                                <hr>

                                <!--Department-->
                                <strong><i class="fa-regular fa-building mr-1"></i>
                                    Department
                                </strong>
                                <p class="text-muted">
                                    @foreach($getDepartment as $data)
                                        @if(Auth::user()->department_id == $data->id)
                                            {{ $data->department_name }}
                                        @endif
                                    @endforeach
                                </p>

                                <hr>

                                <!--Position-->
                                <strong><i class="fa-solid fa-briefcase mr-1"></i> Position</strong>
                                <p class="text-muted">
                                    @foreach($getPosition as $data)
                                        @if(Auth::user()->position_id == $data->id)
                                            {{ $data->position_name }}
                                        @endif
                                    @endforeach
                                </p>

                                <hr>

                                <!--Manager-->
                                <strong><i class="fa-solid fa-person mr-1"></i> Manager</strong>
                                <p class="text-muted">
                                    @foreach($getManager as $data)
                                        @if(Auth::user()->manager_id == $data->id)
                                            {{ $data->name }} {{ $data->last_name }}
                                        @endif
                                    @endforeach
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-9">
                        <div class="card card-outline card-primary">

                            <!--Card Header-->
                            <div class="card-header">

                                <!--Card Title-->
                                <h3 class="card-title">
                                    <i class="fa-regular fa-clone mr-1"></i>
                                    Recent Posts by You
                                </h3>

                                <!--Card Tools-->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>

                            <!--Card Body-->
                            <div class="card-body">
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
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>

@endsection
