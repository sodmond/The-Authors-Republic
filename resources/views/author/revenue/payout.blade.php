@extends('author.layouts.main', ['title' => 'Single Payout Request', 'activePage' => 'revenue'])

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
                                <li class="breadcrumb-item"><a href="{{ route('author.payouts') }}">Payout List</a></li>
                                <li class="breadcrumb-item active">Single Payout Request</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Single Payout Request</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Single Book Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="btn btn-custom" href="{{ route('author.payouts') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6 text-right">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    @php $bg_color = \App\Models\Payout::getStatusBG($payout->status); @endphp
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Amount</th>
                                                <td>{{ number_format($payout->amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Method</th>
                                                <td>{{ ucwords($payout->method) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Reference</th>
                                                <td>{{ $payout->reference }}</td>
                                            </tr>
                                            <tr>
                                                <th>Payment Destination</th>
                                                <td>
                                                    @foreach (json_decode($payout->details) as $key => $item)
                                                        <div><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $item }}</div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><span class="{{$bg_color}} px-2 py-1 rounded text-white">{{ $payout->status }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Date Created</th>
                                                <td>{{ $payout->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <th>Last Updated</th>
                                                <td>{{ $payout->created_at }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    @if($payout->status == 'pending')
                                        <form action="{{ route('author.payout.trash', ['id' => $payout->id]) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection