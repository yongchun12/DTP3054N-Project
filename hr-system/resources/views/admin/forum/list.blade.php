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
                        <a href=" {{ url('admin/forum/posts/create') }} " class="btn btn-primary"> Create Posts</a>
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
                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>
                                        {{ $data->name }}
                                    </strong>
                                    <i class="float-right">Created on : {{ date('h:i A d-F-Y', strtotime($data->created_at)) }}</i>
                                </div>
                                <div class="card-body">
                                    <strong>{{ $data->title }}</strong>
                                    <p class="card-text">{{$data->description}}</p>

                                    <a style="margin-left:10px;" class="btn btn-danger float-right" onclick="return confirm('Are you sure want to delete?')" href="{{ url('admin/forum/delete/'.$data->id) }}">Delete</a>
                                    <a class="btn btn-primary float-right" href="{{ url('admin/forum/view/'.$data->id) }}">View</a>

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
