@extends('author.layouts.main', ['title' => 'Payout List', 'activePage' => 'revenue'])

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
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <button class="btn btn-dark" onclick="javascript:void(0)">
                                        <i class="fa fa-coins"></i> Balance: ₦{{ number_format(auth('author')->user()->balance, 2) }}
                                    </button>
                                </div>
                                <div class="col-md-6 text-right">
                                    @if(auth('author')->user()->balance > 0)
                                        <button class="btn btn-custom" data-toggle="modal" data-target="#newPayoutModal">
                                            <i class="fa fa-plus-circle"></i> Request Payout</button>
                                    @endif
                                </div>
                            </div>
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
                                            <th>Commission %</th>
                                            <th>Amount Paid (₦)</th>
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
                                                <td>{{ number_format($payout->commission, 2) }}</td>
                                                <td>{{ number_format($payout->received_amount, 2) }}</td>
                                                <td><span class="{{$bg_color}} px-2 py-1 rounded text-white">
                                                    {{ $payout->status }}
                                                </span></td>
                                                <td>{{ $payout->created_at }}</td>
                                                <td><a class="btn btn-sm btn-custom" href="{{ route('author.payout', ['id' => $payout->id]) }}">
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

    
<!-- New Payout Request Modal -->
<div class="modal fade" id="newPayoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Payout Request Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="payoutRequestForm" action="{{ route('author.payout.new') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input class="form-control" type="number" id="amount" name="amount" value="{{ old('amount') }}" required>
                    <small class="text-info">You will be charged {{ number_format($basic_setting->payout_commission, 2) }}% commission fee</small>
                </div>
                <div class="form-group">
                    <label for="bank_name">Bank Name</label>
                    <input class="form-control" type="text" id="bank_name" name="bank_name" value="{{ old('bank_name') }}" required>
                </div>
                <div class="form-group">
                    <label for="account_number">Account Number</label>
                    <input class="form-control" type="number" id="account_number" name="account_number" value="{{ old('account_number') }}" required>
                </div>
                <div class="form-group">
                    <label for="account_name">Account Name</label>
                    <input class="form-control" type="text" id="account_name" name="account_name" value="{{ old('account_name') }}" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-custom" onclick="document.getElementById('payoutRequestForm').submit()">Submit</button>
        </div>
      </div>
    </div>
</div>  
@endsection