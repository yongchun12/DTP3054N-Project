<!--View Forum / Reply-->
@extends('layouts.plugins')

@section('title', 'View Topic')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Topic View</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
                        <a href=" {{ url('admin/forum') }} " class="btn btn-primary"><i class="fa-solid fa-arrow-left mr-1"></i>Back</a>
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

                        <div class="card card-widget">
                            <div class="card-header">

                                <!--Profile Picture-->
                                <div class="user-block">
                                    @foreach($getEmployee as $data_employee)
                                        @if($data_employee->id == $getRecord->employee_id)
                                            @if(!empty($data_employee->profile_picture))
                                                @if(file_exists(public_path('img/profile_picture/'.$data_employee->profile_picture)))
                                                    <img src="{{ asset('img/profile_picture/'.$data_employee->profile_picture) }}" class="img-circle img-bordered-sm">
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach

                                    <!--Name-->
                                    <span class="username">
                                        <a>
                                          @foreach($getEmployee as $data_employee)
                                                {{ ($data_employee->id == $getRecord->employee_id) ? ($data_employee->name) : '' }}
                                            @endforeach
                                        </a>
                                    </span>

                                    <span class="description">
                                        {{ $getRecord->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body">

                                <!--Title-->
                                <strong>{{ $getRecord->title }}</strong>

                                <!--Description-->
                                <p style="white-space: pre-line">{{ $getRecord->description }}</p>

                                <span class="float-right text-muted">{{ $getTopicReplyCount }} Comments</span>
                            </div>

                            <!--Comment-->
                            <div class="card-footer card-comments">

                                @forelse($getReply as $data)

                                        <div class="card-comment">

                                            <!--Profile Picture-->
                                            @if(!empty($data->profile_picture))
                                                @if(file_exists(public_path('img/profile_picture/'.$data->profile_picture)))
                                                    <img src="{{ asset('img/profile_picture/'.$data->profile_picture) }}" class="img-circle img-sm">
                                                @endif
                                            @endif

                                        <div class="comment-text">

                                            <span class="username">
                                                @foreach($getEmployee as $data_employee)
                                                    {{ ($data_employee->id == $data->employee_id) ? ($data_employee->name) : '' }}
                                                @endforeach

                                                <span class="text-muted float-right">
                                                    {{ $data->created_at->diffForHumans() }}
                                                </span>
                                            </span>

                                                {{ $data->description }}
                                        </div>

                                            <!--Delete function for detect the user-->
                                            @if($data->employee_id == Auth::user()->id)
                                                <span class="float-right" style="margin-left: 10px;">
                                                    <a onclick="return confirm('Are you sure want to delete?')" href="{{ url('admin/forum/reply/delete/'.$data->id) }}">
                                                        <button type="button" class="btn btn-default btn-sm">
                                                            <i class="fa-solid fa-trash" style="margin-right: 5px;"></i>
                                                                Delete
                                                        </button>
                                                    </a>
                                                </span>
                                            @else
                                                <span class="float-right" style="margin-left: 10px;">
                                                    <a onclick="(alert('You are not allow to delete'))">
                                                        <button type="button" class="btn btn-default btn-sm">
                                                            <i class="fa-solid fa-trash" style="margin-right: 5px;"></i>
                                                            Delete
                                                        </button>
                                                    </a>
                                                </span>
                                            @endif

                                            <!--Edit function for detect the user-->
                                            @if($data->employee_id == Auth::user()->id)
                                                <a href="{{ url('admin/forum/reply/edit/'.$data->id) }}">
                                                    <span class="float-right">
                                                        <button type="button" class="btn btn-default btn-sm">
                                                            <i class="fa-regular fa-pen-to-square" style="margin-right: 5px;"></i>
                                                            Edit
                                                        </button>
                                                    </span>
                                                </a>
                                            @else
                                                <span class="float-right">
                                                    <a onclick="(alert('You are not allow to edit'))">
                                                        <button type="button" class="btn btn-default btn-sm">
                                                            <i class="fa-regular fa-pen-to-square" style="margin-right: 5px;"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                </span>
                                            @endif

                                    </div>

                                @empty
                                    <div class="card-comment" style="text-align: center;">
                                        <div class="comment-text">
                                            No Reply Yet. Be the first to reply!
                                        </div>
                                    </div>
                                @endforelse

                            </div>

                            <!--Reply-->
                            <div class="card-footer">

                                    <form method="post" accept="{{ url('admin/forum/view/'.$getRecord->id) }}" enctype="multipart/form-data">

                                        {{ csrf_field() }}

                                        <!--Get Current Forum ID-->
                                        <input type="hidden" value="{{$getRecord->id}}" name="forum_id">

                                        <!--Current User Profile Picture-->
                                        @if(file_exists(public_path('img/profile_picture/'.Auth::user()->profile_picture)))
                                            <img src="{{ asset('img/profile_picture/'.Auth::user()->profile_picture) }}" class="img-fluid img-circle img-sm" alt="User Image">
                                        @endif

                                            <div class="img-push">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input type="text" name="description" placeholder="Type Message ..." class="form-control form-control-sm">

                                                    <span class="input-group-append">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa-regular fa-paper-plane mr-1"></i>
                                                            Send
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>

                                    </form>

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
