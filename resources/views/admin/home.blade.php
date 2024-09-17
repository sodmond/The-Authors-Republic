@extends('admin.layouts.main', ['title' => 'Dashboard', 'activePage' => 'home'])

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-md-3">
                    <div class="card-box widget-chart-one gradient-info bx-shadow-lg">
                        <div class="float-left" dir="ltr">
                            <span class="text-white" style="font-size:2.9em;"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <div class="widget-chart-one-content text-right">
                            <p class="text-white mb-0 mt-2">Total # of Authors</p>
                            <h3 class="text-white">{{ number_format($authors->count()) }}</h3>
                        </div>
                    </div> <!-- end card-box-->
                </div>
                <div class="col-md-3">
                    <div class="card-box widget-chart-one gradient-dark bx-shadow-lg">
                        <div class="float-left" dir="ltr">
                            <span class="text-white" style="font-size:2.9em;"><i class="fas fa-user"></i></span>
                        </div>
                        <div class="widget-chart-one-content text-right">
                            <p class="text-white mb-0 mt-2">Total # of Users</p>
                            <h3 class="text-white">{{ number_format($users->count()) }}</h3>
                        </div>
                    </div> <!-- end card-box-->
                </div>
                <div class="col-md-3">
                    <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
                        <div class="float-left" dir="ltr">
                            <span class="text-white" style="font-size:2.9em;"><i class="fas fa-book"></i></span>
                        </div>
                        <div class="widget-chart-one-content text-right">
                            <p class="text-white mb-0 mt-2">Total # of Books</p>
                            <h3 class="text-white">{{ number_format($books->count()) }}</h3>
                        </div>
                    </div> <!-- end card-box-->
                </div>
                <div class="col-md-3">
                    <div class="card-box widget-chart-one gradient-primary bx-shadow-lg">
                        <div class="float-left" dir="ltr">
                            <span class="text-white" style="font-size:2.9em;"><i class="fas fa-shopping-cart"></i></span>
                        </div>
                        <div class="widget-chart-one-content text-right">
                            <p class="text-white mb-0 mt-2">Total # of Orders</p>
                            <h3 class="text-white">{{ number_format($ordersCount) }}</h3>
                        </div>
                    </div> <!-- end card-box-->
                </div>
                <div class="col-md-4">
                    <div class="card-box widget-chart-one gradient-primary bx-shadow-lg">
                        <div class="float-left" dir="ltr">
                            <span class="text-white" style="font-size:2.9em;"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <div class="widget-chart-one-content text-right">
                            <p class="text-white mb-0 mt-2">Total Orders</p>
                            <h3 class="text-white">₦{{ number_format($orders->sum('total_cost'), 2) }}</h3>
                        </div>
                    </div> <!-- end card-box-->
                </div>
                <div class="col-md-4">
                    <div class="card-box widget-chart-one gradient-warning bx-shadow-lg">
                        <div class="float-left" dir="ltr">
                            <span class="text-dark" style="font-size:2.9em;"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <div class="widget-chart-one-content text-right">
                            <p class="text-dark mb-0 mt-2">Pending Orders</p>
                            <h3 class="text-dark">₦{{ number_format($orders->where('status', 'pending')->sum('total_cost'), 2) }}</h3>
                        </div>
                    </div> <!-- end card-box-->
                </div>
                <div class="col-md-4">
                    <div class="card-box widget-chart-one gradient-success bx-shadow-lg">
                        <div class="float-left" dir="ltr">
                            <span class="text-white" style="font-size:2.9em;"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <div class="widget-chart-one-content text-right">
                            <p class="text-white mb-0 mt-2">Completed Orders</p>
                            <h3 class="text-white">₦{{ number_format($orders->where('status', 'completed')->sum('total_cost'), 2) }}</h3>
                        </div>
                    </div> <!-- end card-box-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card-box">
                        <h4 class="header-title">Total Revenue</h4>
                        <div class="my-4">
                            <h2 class="font-weight-normal mb-2">₦{{ number_format($earnings->sum('amount'), 2) }} </h2>
                            <p class="text-muted">{{ date('M d, Y', strtotime('2024-08-01')) }} - {{ date('M d, Y') }}</p>
                        </div>

                        <div class="mb-3 chartjs-chart dash-doughnut">
                            <canvas id="doughnut"></canvas>
                        </div>

                        <div>
                            <p><i class="mdi mdi-stop-circle-outline text-success"></i> Balance <span class="float-right font-weight-normal">₦{{ number_format($earnings->sum('amount') - $payouts->sum('amount'), 2) }}</span></p>
                            <p><i class="mdi mdi-stop-circle-outline text-danger"></i> Earnings <span class="float-right font-weight-normal">₦{{ number_format($earnings->sum('amount'), 2) }}</span></p>
                            <p class="mb-0"><i class="mdi mdi-stop-circle-outline"></i> Paid Outs <span class="float-right font-weight-normal">₦{{ number_format($payouts->sum('amount'), 2) }}</span></p>
                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->

                <div class="col-7">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4>Recent Orders</h4>
                            <div class="row">
                                <div class="col-12 col-md-12 p-2">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-success">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Customer</th>
                                                    <th class="text-center">Amount (₦)</th>
                                                    <th class="text-center">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $recentOrderCount = ($ordersCount < 10) ? $ordersCount : 10; ?>
                                                @for ($i=0; $i < $recentOrderCount; $i++)
                                                    <tr>
                                                        <td class="text-center">{{ ucwords($allOrders[$i]->user->firstname.' '.$orders[$i]->user->lastname) }}</td>
                                                        <td class="text-center">{{ number_format($allOrders[$i]->total_cost, 2) }}</td>
                                                        <td class="text-center">{{ $allOrders[$i]->created_at }}</td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection