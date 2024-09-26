@extends('admin.layouts.main', ['title' => 'Payout List', 'activePage' => 'revenue'])

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
                                <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Revenue</li>
                                <li class="breadcrumb-item active">Payout List</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Payout List</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">List of Payout Requests</h4>
                        </div>
                        <div class="card-body">
                            @if (count($errors))
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> Error validating data.<br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Request Amount (₦)</th>
                                            <th>Method</th>
                                            <th>Reference</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                        @foreach ($payouts as $payout)
                                            @php $bg_color = \App\Models\Payout::getStatusBG($payout->status); @endphp
                                            <tr>
                                                <td>{{ $row++ }}</td>
                                                <td>{{ number_format($payout->amount, 2) }}</td>
                                                <td>{{ ucwords($payout->method) }}</td>
                                                <td>{{ $payout->reference }}</td>
                                                <td><span class="{{$bg_color}} px-2 py-1 rounded text-white">
                                                    {{ $payout->status }}
                                                </span></td>
                                                <td>{{ $payout->created_at }}</td>
                                                <td><a class="btn btn-sm btn-custom" href="{{ route('admin.payout', ['id' => $payout->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    {{ $payouts->links() }}
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