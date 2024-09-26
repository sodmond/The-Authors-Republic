@extends('admin.layouts.main', ['title' => 'Single Payout Request', 'activePage' => 'revenue'])

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.payouts') }}">Payout List</a></li>
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
                                    <a class="btn btn-custom" href="{{ route('admin.payouts') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6 text-right">
                                </div>
                            </div>
                            @if (count($errors))
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There are some problems with your input.<br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success"><strong>Success!</strong> {{ session('success') }}</div>
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    @php $bg_color = \App\Models\Payout::getStatusBG($payout->status); @endphp
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Request Amount</th>
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
                                                <th>Commission %</th>
                                                <td>{{ number_format($payout->commission, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Commission (₦)</th>
                                                <td>{{ number_format($payout->org_amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Amount Paid (₦)</th>
                                                <td>{{ number_format($payout->received_amount, 2) }}</td>
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
                                        <button class="btn btn-success mr-4" data-toggle="modal" data-target="#approvePayoutModal">
                                            <i class="fas fa-check-circle"></i> Approve</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#declinePayoutModal">
                                            <i class="fas fa-check-circle"></i> Decline</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->

<!-- Approve Payout Request Modal -->
<div class="modal fade" id="approvePayoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Approve Payout</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="payoutApproveForm" action="{{ route('admin.payout.approve', ['id' => $payout->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="1">
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" id="note" name="note">{{ old('note') }}</textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-custom" onclick="document.getElementById('payoutApproveForm').submit()">Approve</button>
        </div>
      </div>
    </div>
</div>

<!-- Decline Payout Request Modal -->
<div class="modal fade" id="declinePayoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Decline Payout</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="payoutDeclineForm" action="{{ route('admin.payout.approve', ['id' => $payout->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="0">
                <div class="form-group">
                    <label for="note">Reason</label>
                    <textarea class="form-control" id="note" name="note" required>{{ old('note') }}</textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" onclick="document.getElementById('payoutDeclineForm').submit()">Decline</button>
        </div>
      </div>
    </div>
</div> 
@endsection