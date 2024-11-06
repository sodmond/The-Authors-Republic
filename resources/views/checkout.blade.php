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
                            <select name="billing_state" class="form-control" id="billingState" required>
                                <option value="">- - - Select State - - -</option>
                                @foreach ($shipping_location as $location)
                                    @if(isset($address->state))
                                        <option value="{{ $location->id }}" @selected($address->state == $location->id)>{{ ucwords($location->state) }}</option>
                                    @else
                                        <option value="{{ $location->id }}">{{ ucwords($location->state) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-bottom:30px;">
                <div style="width:100%; box-shadow:0 1px 6px rgba(0,0,0,.175); float:left; padding:15px;">
                    <h3>Shipping Address (Optional)</h3>
                    <p>Leave empty if its the same as billing address</p>
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
                            <select name="shipping_state" class="form-control" required id="shippingState">
                                <option value="">- - - Select State - - -</option>
                                @foreach ($shipping_location as $location)
                                    @if(isset($address->state))
                                        <option value="{{ $location->id }}" @selected($address->state == $location->id)>{{ ucwords($location->state) }}</option>
                                    @else
                                        <option value="{{ $location->id }}">{{ ucwords($location->state) }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group tg-hastextarea">
                        <textarea class="form-control" name="note" rows="2" placeholder="Notes about your order, e.g. special notes for delivery" style="max-height:110px;">{{ old('note') }}</textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" name="shipping_fee" value="0">
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
                                @php $hardCopyStatus = 0; @endphp
                                @foreach ($cart as $item)
                                    @php 
                                        $book = $allBooks[$item->book_id];
                                        $bookImage = ($book->image != '') ? asset('storage/'.$book->image) : asset('frontend/images/products/img-01.jpg');
                                        if ($book->hard_copy == 1 && $book->stock >= $item->quantity) {
                                            $hardCopyStatus += 1;
                                        }
                                    @endphp
                                    <tr>
                                        <td><img src="{{ $bookImage }}" alt="image description" style="max-width:50px;"></td>
                                        <td>
                                            <h5>{{ $book->title }}</h5>
                                            @if($book->hard_copy == 1 && $book->soft_copy == 0 && $book->stock < 1)
                                                <div class="small text-danger">Out of Stock</div>
                                            @endif
                                        </td>
                                        <td><strong>₦ {{ number_format($book->price, 2) }}</strong></td>
                                        <td>{{ $item->quantity }}</td>
                                    </tr>
                                    @php 
                                        if(($book->hard_copy == 1 && $book->soft_copy == 0 && $book->stock > 0) || ($book->soft_copy == 1)) {
                                            $subtotal += ($book->price * $item->quantity);
                                        }
                                    @endphp
                                @endforeach
                                <input type="hidden" id="hardCopyStatus" value="{{ $hardCopyStatus }}">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4" style="margin-bottom:30px;">
                <div style="box-shadow: 0 1px 6px rgba(0,0,0,.175); float:left; padding:15px; width:100%;">
                    <h3>Order Total</h3>
                    <div class="tg-minicartfoot">
                        <div class="mb-2" style="float:left; width:100%;">
                            <span class="tg-btnemptycart" style="font-size:16px;">Subtotal:</span>
                            <span class="tg-subtotal"><strong>₦{{ number_format($subtotal) }}</strong></span>
                            <input type="hidden" name="sub_total" value="{{ $subtotal }}">
                        </div>
                        <div class="mb-2" style="float:left; width:100%;">
                            <span class="tg-btnemptycart" style="font-size:16px;">Shipping Fee:</span>
                            <span class="tg-subtotal" id="shippingCost"><strong>₦0.00</strong></span>
                        </div>
                        <div class="mb-2" style="float:left; width:100%;">
                            <span class="tg-btnemptycart" style="font-size:16px;">Total:</span>
                            <span class="tg-subtotal" id="totalCost"><strong>₦{{ ($subtotal)}}</strong></span>
                        </div>
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
<input type="hidden" id="calShippingFeeLink" value="{{ route('shipping_fee') }}">
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function(){
            $('#checkoutBtn').hide();
            if ($('#shippingState').val() != '') {
                calculateShipping($('#shippingState').val());
            } else{
                calculateShipping($('#billingState').val());
            }
        });
        $('#billingState').change(function () {
            if ($('#shippingState').val() == '') {
                calculateShipping($(this).val());
            }
        });
        $('#shippingState').change(function () {
            if ($(this).val() != '') {
                calculateShipping($(this).val());
            } else {
                calculateShipping($('#billingState').val());
            }
        });
        $('#checkoutBtn').click(function() {
            //$('#checkoutForm').append('<input type="hidden" name="checkout" value="checkout">');
            $('#checkoutForm').submit();
        });
        function calculateShipping(state_id) {
            $.ajax({
                type: 'GET',
                url: $('#calShippingFeeLink').val() + '?state_id=' + state_id,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        const numberFormatter = new Intl.NumberFormat();
                        var shipping_fee = parseFloat(data.amount).toFixed(2);
                        var hardCopyStatus = $('#hardCopyStatus').val();
                        if (hardCopyStatus < 1) {
                            shipping_fee = 0;
                        }
                        $('#shippingCost').html('<strong>₦' + numberFormatter.format(shipping_fee) + '</strong>');
                        $('input[name=shipping_fee]').val(shipping_fee)
                        var subtotal = $('input[name=sub_total]').val()
                        var totalCost = parseInt(shipping_fee) + parseInt(subtotal)
                        $('#totalCost').html('<strong>₦' + numberFormatter.format(totalCost) + '</strong>');
                        $('#checkoutBtn').show('slow');
                    } else {
                        $('#checkoutBtn').hide('slow');
                        //console(data.error);
                    }
                }
            });
        }
    </script>
@endpush