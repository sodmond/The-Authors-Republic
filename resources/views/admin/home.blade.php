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
                            <h3 class="text-white">{{ number_format($booksCount) }}</h3>
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
                            <h3 class="text-white">{{ number_format($booksCount) }}</h3>
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
                            <h3 class="text-white">{{ number_format($booksCount) }}</h3>
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
                            <h3 class="text-white">₦{{ number_format($ordersTotal, 2) }}</h3>
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
                            <h3 class="text-dark">₦{{ number_format($ordersTotal, 2) }}</h3>
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
                            <h3 class="text-white">₦{{ number_format($ordersTotal, 2) }}</h3>
                        </div>
                    </div> <!-- end card-box-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card-box">
                        <h4 class="header-title">Total Revenue</h4>
                        <div class="my-4">
                            <h2 class="font-weight-normal mb-2">₦6,584.22 <i class="mdi mdi-arrow-up text-success"></i></h2>
                            {{--<p class="text-muted">March 26 - April 01</p>--}}
                        </div>

                        <div class="mb-3 chartjs-chart dash-doughnut">
                            <canvas id="doughnut"></canvas>
                        </div>

                        <div>
                            <p><i class="mdi mdi-stop-circle-outline text-success"></i> Order Sales <span class="float-right font-weight-normal">$825.25</span></p>
                            <p><i class="mdi mdi-stop-circle-outline text-danger"></i> Paid Outs <span class="float-right font-weight-normal">$1,254</span></p>
                            <p class="mb-0"><i class="mdi mdi-stop-circle-outline"></i> Profit <span class="float-right font-weight-normal">$89.66</span></p>
                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->

                <div class="col-7">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4>Recent Orders</h4>
                            <div class="row">
                                {{--@foreach ($challenges as $challenge)
                                    <div class="col-12 col-md-3 p-2">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-success">
                                                <thead>
                                                    <tr><th class="text-center">{{ $challenge->title }}</th></tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td class="text-center">
                                                        Trade Amount - ${{ number_format($challenge->trade_amount, 2) }}
                                                    </td></tr>
                                                    <tr><td class="text-center">
                                                        Duration - {{ ($challenge->duration == 0) ? 'Indefinite' : $challenge->duration . ' days' }}
                                                    </td></tr>
                                                    <tr><td class="text-center">
                                                        Fee - ${{ number_format($challenge->fee) }}
                                                    </td></tr>
                                                    <tr><td class="text-center">
                                                        Max Daily Loss - {{ ($challenge->max_daily_loss) }}%
                                                    </td></tr>
                                                    <tr><td class="text-center">
                                                        Max Overall Loss - {{ ($challenge->max_daily_loss) }}%
                                                    </td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection