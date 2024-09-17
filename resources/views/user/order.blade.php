@extends('layouts.app', ['activePage' => 'user.order', 'title' => 'Order Details'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row" style="margin-bottom:30px;">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default shadow">
                    <div class="panel-heading"><h4>Order Details</h4></div>
                    <div class="panel-body p-4">
                        <p><strong>Order #:</strong> {{ $order->code }}</p>
                        <p><strong>Status:</strong> {{ $order->status }}</p>
                        <p><strong>Note:</strong> {{ $order->code }}</p>
                        <p><strong>Date Created:</strong> {{ $order->created_at }}</p>
                        <p><strong>Last Updated:</strong> {{ $order->updated_at }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default shadow">
                    <div class="panel-heading"><h4>Billing Address</h4></div>
                    <div class="panel-body">
                        <p><strong>Name:</strong> {{ ucwords($order_address->billing_fname.' '.$order_address->billing_lname) }}</p>
                        <p><strong>Address:</strong> {{ $order_address->billing_address }}</p>
                        <p><strong>City:</strong> {{ $order_address->billing_city }}</p>
                        <p><strong>State:</strong> {{ $order_address->billing_state }}</p>
                        <p><strong>Zipcode:</strong> {{ $order_address->billing_zip }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-default shadow">
                    <div class="panel-heading"><h4>Shipping Address</h4></div>
                    <div class="panel-body">
                        <p><strong>Name:</strong> {{ ucwords($order_address->shipping_fname.' '.$order_address->shipping_lname) }}</p>
                        <p><strong>Address:</strong> {{ $order_address->shipping_address }}</p>
                        <p><strong>City:</strong> {{ $order_address->shipping_city }}</p>
                        <p><strong>State:</strong> {{ $order_address->shipping_state }}</p>
                        <p><strong>Zipcode:</strong> {{ $order_address->shipping_zip }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default shadow">
                    <div class="panel-heading"><h4>Order Items</h4></div>
                    <div class="panel-body p-4">
                        <div class="table-responsive">
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
                                                @if($order->status == 'completed' && $books[$item->book_id]->soft_copy == true)
                                                <form method="POST" action="{{ route('user.book.download') }}">
                                                    @csrf
                                                    <input type="hidden" name="book_id" value="{{ $item->book_id }}">
                                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                    <button class="btn btn-sm btn-success" title="Download Book File">
                                                        <i class="fa fa-download"></i></button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-right">
                            <div class="col-md-7"></div>
                            <div class="col-md-5">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>₦{{ number_format($order->subtotal, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping Fee</th>
                                                <td>₦{{ number_format($order->shipping_fee, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Order Total</th>
                                                <td>₦{{ number_format($order->total_cost, 2) }}</td>
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
    </div>
</section>
@endsection
