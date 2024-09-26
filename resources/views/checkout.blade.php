@extends('layouts.app', ['activePage' => 'cart', 'title' => 'Checkout'])

@section('content')
@php $subtotal = 0; @endphp
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        @if (count($errors))
            <div class="alert alert-danger">
                <strong class="text-danger">Whoops!</strong> Error validating data.<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="row" method="POST" action="" id="checkoutForm">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-bottom:30px;">
                <div style="width:100%; box-shadow:0 1px 6px rgba(0,0,0,.175); float:left; padding:15px; min-height:100%;">
                    <h3>Billing Address</h3>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <input type="text" name="billing_fname" class="form-control" id="fname" required placeholder="Firstname" value="{{ $address->fname ?? old('billing_fname') }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="billing_lname" class="form-control" id="lname" required placeholder="Lastname" value="{{ $address->lname ?? old('billing_lname') }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <input type="text" name="billing_address" class="form-control" id="address" required placeholder="Address" value="{{ $address->address ?? old('billing_address') }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <input type="text" name="billing_city" class="form-control" id="city" required placeholder="City" value="{{ $address->city ?? old('billing_city') }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="billing_zip" class="form-control" id="zip" required placeholder="Postal/Zipcode" value="{{ $address->zip ?? old('billing_zip') }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <input type="text" name="billing_state" class="form-control" id="state" placeholder="State" value="{{ $address->state ?? old('billing_state') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-bottom:30px;">
                <div style="width:100%; box-shadow:0 1px 6px rgba(0,0,0,.175); float:left; padding:15px;">
                    <h3>Shipping Address</h3>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <input type="text" name="shipping_fname" class="form-control" id="fname" required placeholder="Firstname" value="{{ $address->fname ?? old('shipping_fname') }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="shipping_lname" class="form-control" id="lname" required placeholder="Lastname" value="{{ $address->lname ?? old('shipping_lname') }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <input type="text" name="shipping_address" class="form-control" id="address" placeholder="Address" value="{{ $address->address ?? old('shipping_address') }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <input type="text" name="shipping_city" class="form-control" id="city"  placeholder="City" value="{{ $address->city ?? old('shipping_city') }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="shipping_zip" class="form-control" id="zip" placeholder="Postal/Zipcode" value="{{ $address->zip ?? old('shipping_zip') }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <input type="text" name="shipping_state" class="form-control" id="state" placeholder="State" value="{{ $address->state ?? old('shipping_state') }}">
                        </div>
                    </div>
                    <div class="form-group tg-hastextarea">
                        <textarea class="form-control" name="note" rows="2" placeholder="Notes about your order, e.g. special notes for delivery" style="max-height:110px;">{{ old('note') }}</textarea>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8" style="margin-bottom:30px;">
                <div style="width:100%; box-shadow:0 1px 6px rgba(0,0,0,.175); float:left; padding:15px;">
                    @csrf
                    <h3>Your Order</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>IMAGE</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    @php 
                                        $book = $allBooks[$item->book_id];
                                        $bookImage = ($book->image != '') ? asset('storage/'.$book->image) : asset('frontend/images/products/img-01.jpg');
                                    @endphp
                                    <tr>
                                        <td><img src="{{ $bookImage }}" alt="image description" style="max-width:70px;"></td>
                                        <td><h5>{{ $book->title }}</h5></td>
                                        <td><strong>₦ {{ number_format($book->price, 2) }}</strong></td>
                                        <td>{{ $item->quantity }}</td>
                                    </tr>
                                    @php $subtotal += ($book->price * $item->quantity); @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4" style="margin-bottom:30px;">
                <div style="box-shadow: 0 1px 6px rgba(0,0,0,.175); float:left; padding:15px; width:100%;">
                    <h3>Order Total</h3>
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
    </div>
</section>
@endsection

@push('custom-scripts')
    <script>
        $('#checkoutBtn').click(function() {
            //$('#checkoutForm').append('<input type="hidden" name="checkout" value="checkout">');
            $('#checkoutForm').submit();
        });
    </script>
@endpush