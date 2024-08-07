@extends('admin.layouts.main', ['title' => 'Admin Dashboard', 'activePage' => 'home'])

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
                <div class="col-6">
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <h4 class="h5 text-white">Active Challenge</h4>
                        </div>
                        <div class="card-body">
                            {{--@if ($order)
                                <?php 
                                $ch = $challenges->keyBy('id');
                                $aCh = $ch[$order->challenge_id];
                                ?>
                                <div class="btn btn-outline-success col">
                                    <span class="h3">Challenge</span>
                                </div>
                            @else
                                <div>No active challenge...</div>
                                <a class="btn btn-outline-primary col mt-4" href="#">
                                    <i class="fa fa-plus"></i> Add New Challenge
                                </a>
                            @endif--}}
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4>All Challenges</h4>
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