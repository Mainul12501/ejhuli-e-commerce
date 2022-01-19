@extends('customer.layout.master-page-support')
@section('title','Checkout')
@section('page-content')
<style>
    .btn-fill-out2 {
        background-color: transparent;
        border: 1px solid #FF324D;
        color: #FF324D;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .btn-fill-out2::before,
    .btn-fill-out2::after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        background-color:#fffff8;
        color: #FF324D;
        z-index: -1;
        transition: all 0.3s ease-in-out;
        width: 51%;
    }

    .btn-fill-out2::after {
        right: 0;
        left: auto;
    }
    .btn-fill-out2:hover:before,
    .btn-fill-out2:hover:after {
        width: 0;
    }
    .btn-fill-out2:hover {
        background-color:#FF324D;
        color: #fffff8 !important;
    }
</style>
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{route('viewHome')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('viewCart')}}">Cart</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- START checkout -->
    <div class="section">
        <div class="container">
            <form id="checkoutForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s3">
                            <h5>Select Address</h5>
                        </div>
                        <div class="addresses">
                            <ul class="listview image-listview flush" id="checkAddress">
                                @if($addresses)
                                    @foreach($addresses as $key=>$address)
                                        <li>
                                            <a href="javaScript:void(0)" class="item">
                                                <div class="icon-box">
                                                    <div class="payment_method">
                                                        <div class="payment_option">
                                                            <div class="custome-radio">
                                                                <input class="form-check-input" type="radio" name="address_option" id="address{{$address->id}}" {{ $key == 0 ? 'checked' : '' }} value="{{$address->id}}">
                                                                <label class="form-check-label" for="address{{$address->id}}"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="in">
                                                    <div>
                                                        <div class="title">{{$address->address_name}}</div>
                                                        <div class="title text-small" id="name{{ $key }}">{{$address->full_name}}</div>
                                                        <div class="title text-small" id="mobile{{ $key }}">{{$address->contact}}</div>
                                                        <div class="text-small mb-05">{{$address->street_address}}<br/> {{$address->town_city}},{{$address->state}} - {{$address->postal_code}}</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <a href="{{route('addAddress')}}" class="btn btn btn-fill-out2 btn-block"> <i class="linearicons-plus"></i> Add New Address</a>
                        <div class="error" id="address_optionError"></div>
                        <div class="heading_s1" style="margin-top: 20px;">
                            <h5>Additional information</h5>
                        </div>
                        <div class="form-group mb-0">
                            <textarea rows="5" name="additional_info" id="additional_info" class="form-control" placeholder="Order notes"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1"><h4>Your Orders</h4></div>
                            <div class="table-responsive order_table">
                                <div class="spinner-red" id="checkout-loader"></div>
                            </div>
                            <div class="payment_method">
                                <div class="heading_s1"><h4>Payment</h4></div>
                                <div class="payment_option">
                                    {{--<div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="paymentFromWallet" value="wallet" checked="">
                                        <label class="form-check-label" for="paymentFromWallet">Direct From Wallet | <a href="{{ route('viewCustomerDashboard') }}" target="_blank" class="theme-color">Add Money</a></label>
                                        <p data-method="wallet" class="payment-text" style="display: block;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                                    </div>--}}
                                    @if($cashOnDelivery == 'Yes')
                                        <div class="custome-radio">
                                            <input class="form-check-input" checked type="radio" name="payment_option" id="cod" value="cod">
                                            <label class="form-check-label" for="cod">Cash on delivery</label>
                                            <p data-method="cod" class="payment-text" >Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    @endif
                                    <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="payment_option" id="spay" value="spay">
                                        <label class="form-check-label" for="spay">ShurjoPay</label>
                                        <p data-method="spay" class="payment-text" >Complete your payment with ShurjoPay online payment gateway.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .ho {
                                    display: none;
                                }
                            </style>
                            <button type="submit" id="placeOrderBtn" class="btn btn-fill-out btn-block" style="display: none;">Place Order</button>
{{--                            <a  href="#" onclick="event.preventDefault(); document.getElementById('surjoData').submit();" style="display: none;" id="placeOrderSpay" class="btn btn-fill-out btn-block">Pay with ShurjoPay</a>--}}
                            <a  href="" style="display: none;" id="placeOrderSpay" class="btn btn-fill-out btn-block">Pay with ShurjoPay fuck</a>
{{--                            <a  href="javascript:void(0)" id="placeBtn" class="btn btn-fill-out btn-block">Place Order</a>--}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form action="{{ route('send-money') }}" method="POST" id="surjoData" style="display: none;">
        @csrf
        <input type="hidden" name="total_amount" id="hidddenTotalAmount" >
        <input type="hidden" name="username" value="{{ \Illuminate\Support\Facades\Auth::user()->username }}" >
    </form>
    <!-- END SECTION SHOP -->
@endsection
@section('customer-js')
    <script src="{{asset('assets/js/customer/login/customer-login.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/customer/cart/create-update-cart.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/customer/checkout/checkout.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.all.min.js" integrity="sha512-kW/Di7T8diljfKY9/VU2ybQZSQrbClTiUuk13fK/TIvlEB1XqEdhlUp9D+BHGYuEoS9ZQTd3D8fr9iE74LvCkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var paymentBtnType = $('[name="payment_option"]:checked').val();

        if (paymentBtnType === 'cod') {
            $('#placeOrderSpay').css('display', 'none');
            $('#placeOrderBtn').css('display', 'block');

        } elseif(paymentBtnType === 'spay')
        {
            $('#placeOrderSpay').css('display', 'block');
            $('#placeOrderBtn').css('display', 'none');
        }

    </script>

    <script>

        $('#placeOrderSpay').click(function (){
            event.preventDefault();
            var data    = '{{ count($addresses) }}';
            if (data > 0){
                document.getElementById('surjoData').submit();
            } else {
                toastr.error('You need to add an address!.', 'Oops!')
            }
        });
    </script>

    <script>

        $(document).ready(function () {

            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const url_data={
                'status':urlParams.get('status'),
                'msg':urlParams.get('msg'),
                'tx_id':urlParams.get('tx_id'),
                'bank_tx_id':urlParams.get('bank_tx_id'),
                'amount':urlParams.get('amount'),
                'bank_status':urlParams.get('bank_status'),
                'sp_code':urlParams.get('sp_code'),
                'sp_code_des':urlParams.get('sp_code_des'),
                'sp_payment_option':urlParams.get('sp_payment_option'),
                'custom1':urlParams.get('custom1'),
                'custom2':urlParams.get('custom2'),
                'custom3':urlParams.get('custom3'),
                'custom4':urlParams.get('custom4'),
            }


            if (url_data.status === 'Success')
            {
                $('#spay').attr('checked', 'checked');
                $('#cod').removeAttr('checked');
                $.ajax({
                    url: BASE_URL+'set-spdata-session',
                    method: 'POST',
                    data: url_data,
                    success: function (data) {
                        console.log(data);
                    }
                })
            }
            if ((url_data.status != null) && ((url_data.status === 'Failed') || (url_data.status === 'Canceled')))
            {
                $('#spay').attr('checked', 'checked');
                $('#cod').removeAttr('checked');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again.',
                    // footer: '<a href="">Why do I have this issue?</a>'
                });
            }


            // show hide shurjopay button
            var paymentBtnType = $("[name='payment_option']:checked").val();

            if (paymentBtnType === 'cod') {
                $('#placeOrderSpay').css('display', 'none');
                $('#placeOrderBtn').css('display', 'block');
            }
            if (paymentBtnType === 'spay') {
                $('#placeOrderSpay').css('display', 'block');
                $('#placeOrderBtn').css('display', 'none');

                setTimeout(function (){
                    $('#spay').trigger('click');
                }, 1000)

            }

            if ((url_data.tx_id != null) && (url_data.status === 'Success'))
            {
                setTimeout(function () {
                    $('#placeOrderBtn').trigger('click');
                }, 2000);
            }
        })
    </script>

@endsection
