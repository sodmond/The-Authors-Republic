@extends('layouts.app', ['activePage' => 'user.orders', 'title' => 'Order History'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default shadow">
                    <div class="panel-heading"><h4>All Orders</h4></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Books #</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->code }}</td>
                                            <td>{{ count($orders[0]->orderContent) }}</td>
                                            <td>{{ number_format($order->total_cost, 2) }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ route('user.order', ['id' => $order->id, 'code' => $order->code]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col">{{ $orders->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
