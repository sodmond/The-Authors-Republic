@extends('layouts.app', ['activePage' => 'user.home', 'title' => 'User Dashboard'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-sectionhead" style="padding-bottom:10px;">
                        <h3>Hi, {{ ucwords(Auth::guard('web')->user()->firstname) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default shadow">
                    <div class="panel-body bg-success p-4">
                        <a class="panel-link" href="{{ route('user.orders') }}">
                            <div class="panel-top">
                                <span class="panel-icon"><i class="fa fa-first-order"></i></span>
                                <span class="panel-text">All Orders</span>
                            </div>
                            <div class="panel-digit">{{ $orders->count() }}</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default shadow">
                    <div class="panel-body bg-warning p-4">
                        <a class="panel-link" href="{{ route('user.wishlist') }}">
                            <div class="panel-top">
                                <span class="panel-icon"><i class="fa fa-heart"></i></span>
                                <span class="panel-text">Saved Items</span>
                            </div>
                            <div class="panel-digit">{{ $wishlist->count() }}</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default shadow">
                    <div class="panel-body bg-custom p-4">
                        <a class="panel-link text-white" href="{{ route('user.profile') }}">
                            <div class="panel-top">
                                <span class="panel-icon"><i class="fa fa-user"></i></span>
                                <span class="panel-text">My Profile</span>
                            </div>
                            <div class="panel-digit">1</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default shadow">
                    <div class="panel-body bg-info p-4">
                        <a class="panel-link" href="{{ route('user.addressBook') }}">
                            <div class="panel-top">
                                <span class="panel-icon"><i class="fa fa-address-book"></i></span>
                                <span class="panel-text">Address Book</span>
                            </div>
                            <div class="panel-digit">{{ $addressBook->count() }}</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default shadow">
                    <div class="panel-body bg-danger p-4">
                        <a class="panel-link" href="{{ route('user.settings') }}">
                            <div class="panel-top">
                                <span class="panel-icon"><i class="fa fa-cog"></i></span>
                                <span class="panel-text">Settings</span>
                            </div>
                            <div class="panel-digit">1</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
