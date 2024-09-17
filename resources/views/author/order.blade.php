@extends('author.layouts.main', ['title' => 'Single Order', 'activePage' => 'orders'])

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
                                <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('author.orders') }}">Orders</a></li>
                                <li class="breadcrumb-item active">Single Order</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Single Order</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Order Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-auto">
                                    <a class="btn btn-custom" href="{{ route('author.orders') }}">
                                        <i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-7">
                                    @php $bg_color = \App\Models\Order::getStatusBG($order->status); @endphp
                                    <div class="table-responsive">
                                        <table class="table table-striped">    
                                            <tbody>
                                                <tr>
                                                    <th>Order #:</th>
                                                    <td>{{ $order->code }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Books #:</th>
                                                    <td>{{ count($order->orderContent) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status:</th>
                                                    <td><span class="{{$bg_color}} px-2 py-1 rounded text-white">{{ $order->status }}</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Note:</th>
                                                    <td>{{ $order->note }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date Created:</th>
                                                    <td>{{ $order->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Last Updated:</th>
                                                    <td>{{ $order->updated_at }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <h4 class="mb-2">Order Items</h4>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Book Title</th>
                                            <th>Quantity</th>
                                            <th>Cost Per Each</th>
                                            <th>Total Amount</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $qty = json_decode($order->quantities); 
                                            $row = 1;
                                        @endphp
                                        @foreach ($order_content as $item)
                                            <tr>
                                                <td>{{ $row++ }}</td>
                                                <td><img src="{{ asset('storage/'.$books[$item->book_id]->image) }}" style="max-width:50px;"></td>
                                                <td>{{ $books[$item->book_id]->title }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->amount, 2) }}</td>
                                                <td>{{ number_format(($item->amount*$item->quantity), 2) }}</td>
                                                <td>
                                                    -
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Order Address</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <h4>Billing Address</h4>
                                        <table class="table table-hover table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $order_address->billing_fname.' '.$order_address->billing_lname }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{ $order_address->billing_address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td>{{ $order_address->billing_city }}</td>
                                                </tr>
                                                <tr>
                                                    <th>State</th>
                                                    <td>{{ $order_address->billing_state }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Zip/Postal Code</th>
                                                    <td>{{ $order_address->billing_zip }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <h4>Shipping Address</h4>
                                        <table class="table table-hover table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $order_address->shipping_fname.' '.$order_address->shipping_lname }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{ $order_address->shipping_address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td>{{ $order_address->shipping_city }}</td>
                                                </tr>
                                                <tr>
                                                    <th>State</th>
                                                    <td>{{ $order_address->shipping_state }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Zip/Postal Code</th>
                                                    <td>{{ $order_address->shipping_zip }}</td>
                                                </tr>
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