@extends('admin.layouts.main', ['title' => 'Earnings', 'activePage' => 'revenue'])

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
                                <li class="breadcrumb-item">Revenue</li>
                                <li class="breadcrumb-item active">Earnings</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Earnings</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">My Earnings</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Author</th>
                                            <th>Order ID</th>
                                            <th>Pre Balance</th>
                                            <th>Amount</th>
                                            <th>After Balance</th>
                                            <th>Date Created</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                        @foreach ($earnings as $earning)
                                            <tr>
                                                <td>{{ $row++ }}</td>
                                                <td>{{ ucwords($earning->author->firstname.' '.$earning->author->lastname) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.order', ['id' => $earning->order_id]) }}">
                                                        {{ ($orders[$earning->order_id]->code) }}</a>
                                                </td>
                                                <td>{{ number_format($earning->pre_balance, 2) }}</td>
                                                <td>{{ number_format($earning->amount, 2) }}</td>
                                                <td>{{ number_format($earning->after_balance, 2) }}</td>
                                                <td>{{ $earning->created_at }}</td>
                                                <td>
                                                    {{--<a class="btn btn-sm btn-custom" href="{{ route('admin.earning', ['id' => $earning->id]) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    {{ $earnings->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection