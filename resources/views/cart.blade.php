@extends('layouts.app', ['activePage' => 'cart', 'title' => 'Cart'])

@section('content')
@php $subtotal = 0; @endphp
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        @if ($cart->count() > 0)
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8" style="margin-bottom:30px;">
                <form action="{{ route('cart.update') }}" method="POST" id="cartForm" style="box-shadow: 0 6px 12px rgba(0,0,0,.175); float:left; padding:15px;">
                    @csrf
                    @if(session('success'))
                        <div class="alert alert-success" role="alert"><strong>Success!</strong> {{ session('success') }}</div>
                    @endif
                    <div class="tg-minicartbody">
                        @foreach($cart as $item)
                        <div class="tg-minicarproduct" style="padding:10px 0px 10px 0px; border-bottom:1px solid #dbdbdb;">
                            @php
                                $book = $allBooks[$item->book_id];
                                $bookImage = ($book->image != '') ? asset('storage/'.$book->image) : asset('frontend/images/products/img-01.jpg') 
                            @endphp
                            <figure>
                                <img src="{{ $bookImage }}" alt="book image" style="max-width:70px;">
                            </figure>
                            <div class="tg-minicarproductdata row">
                                @php $slug = \App\Models\Book::getSlug($book->title); @endphp
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <input type="hidden" name="book_ids[]" id="bookId{{ $book->id }}" value="{{ $book->id }}">
                                    <h5><a href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}">{{ $book->title }}</a></h5>
                                    <h6>₦ {{ number_format($book->price, 2) }}</h6>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <label for="qty">QTY</label>
                                    <input type="number" class="form-control" name="quantities[]" min="1" value="{{ $item->quantity }}">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 col-lg-offset-1">
                                    <a href="submit" class="btn btn-sm btn-danger text-white">
                                        <i class="fa fa-trash-o"></i> REMOVE
                                    </a>
                                    {{--<form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    </form>--}}
                                </div>
                                @php $subtotal += ($book->price * $item->quantity); @endphp
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="tg-minicartfoot">
                        <a class="tg-btnemptycart" href="#">
                            <i class="fa fa-trash-o"></i>
                            <span>Clear Your Cart</span>
                        </a>
                        <span class="tg-subtotal">
                            Subtotal: <strong>₦{{ number_format($subtotal, 2) }}</strong>
                        </span>
                        <div class="tg-btns">
                            <button type="submit" class="tg-btn tg-active" style="float:right;" href="#">Update Cart</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4" style="margin-bottom:30px;">
                <div style="box-shadow: 0 6px 12px rgba(0,0,0,.175); float:left; padding:15px; width:100%;">
                    <div class="tg-minicartfoot">
                        <span class="tg-btnemptycart" style="font-size:16px;">
                            Subtotal:
                        </span>
                        <span class="tg-subtotal"><strong>₦{{ number_format($subtotal, 2)}}</strong></span>
                        <div class="tg-btns">
                            <button class="tg-btn tg-active" id="checkoutBtn" style="width:100%;">
                                Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <h3 style="font-weight:500; margin-bottom:20px;">Your cart is currently empty.</h3>
                <a class="tg-btn tg-active" href="{{ route('books') }}">Start shopping</a>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('custom-scripts')
    <script>
        $('#checkoutBtn').click(function() {
            $('#cartForm').append('<input type="hidden" name="checkout" value="checkout">');
            $('#cartForm').submit();
        });
    </script>
@endpush