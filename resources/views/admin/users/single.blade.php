@extends('admin.layouts.main', ['title' => 'User Details', 'activePage' => 'users'])

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
                                <li class="breadcrumb-item active">User Details</li>
                            </ol>
                        </div>
                        <h4 class="page-title">User Details</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Single User Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="btn btn-custom" href="{{ route('admin.users') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-info" href="{{ route('admin.user.orders', ['id' => $user->id]) }}"><i class="fa fa-shopping-bag"></i> Orders</a>
                                    <a class="btn btn-primary" href="{{ route('admin.user.posts', ['id' => $user->id]) }}"><i class="fa fa-newspaper"></i> Posts</a>
                                    <a class="btn btn-warning" href="{{ route('admin.user.comments', ['id' => $user->id]) }}"><i class="fa fa-comment"></i> Comments</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Firstname</th>
                                                <td>{{ $user->firstname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Lastname</th>
                                                <td>{{ $user->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $user->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date Created</th>
                                                <td>{{ $user->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <th>Last Updated</th>
                                                <td>{{ $user->updated_at }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Recent Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Book #</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>
                                            <th>Date Create</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            @php $bg_color = \App\Models\Order::getStatusBG($order->status); @endphp
                                            <tr>
                                                <td>{{ $order->code }}</td>
                                                <td>{{ count($order->orderContent) }}</td>
                                                <td>{{ number_format($order->total_cost, 2) }}</td>
                                                <td><span class="{{$bg_color}} px-2 py-1 rounded text-white">{{ $order->status }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td><a class="btn btn-sm btn-custom" href="{{ route('author.order', ['id' => $order->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection