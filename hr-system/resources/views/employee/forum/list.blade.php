<!--Leave Request-->
@extends('layouts.plugins')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Forum</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
                        <a href=" {{ url('employee/forum/posts/create') }} " class="btn btn-primary">
                            <i class="fa-solid fa-plus mr-1"></i>
                            Create Posts
                        </a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--Content-->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-md-12">

                        <!--Alert Message-->
                        @include('layouts.alert_message')

                        <!--Data-->
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
                                                            <a href="{{ url('employee/forum/edit/'.$data->id) }}">
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
                                                            <a href="{{ url('employee/forum/delete/'.$data->id) }}" onclick="return confirm('Are you sure want to delete?')">
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
                                                            <a href="{{ url('employee/forum/view/'.$data->id) }}">
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

                    </section>
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
