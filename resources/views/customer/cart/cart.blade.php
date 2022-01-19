@extends('customer.layout.master-page-support')
@section('title','Cart')
@section('page-content')
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{route('viewHome')}}">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="spinner-red" id="cart-loader"></div>
    <div class="container" id="shop_cart_table_section" style="display: none;">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive" id="cart_table">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="toggle_info">
                    <span><i class="fas fa-tag"></i>Have a coupon? <a href="#coupon" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                </div>
                <div class="panel-collapse collapse coupon_form" id="coupon">
                    <div class="panel-body">
                        <p>If you have a coupon code, please apply it below.</p>
                        <div class="coupon field_form input-group">
                            <input type="text" name="couponCode" id="couponCode"  class="form-control" placeholder="Enter Coupon Code..">
                            <div class="input-group-append">
                                <button onclick="applyCouponCode();" class="btn btn-fill-out" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="cart_total">
                <div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="cart_total_label">Cart Subtotal</td>
                                <td class="cart_sub_total_amount">$0</td>
                            </tr>
                            <tr id="couponApplied" style="display: none">
                                <td>Coupon</td>
                                <td class="coupon_applied_count"><strong>0 Coupon Applied </strong></td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">Shipping Charge</td>
                                <td class="cart_shiping_charge"></td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">Total</td>
                                <td class="cart_total_amount"><strong>$0</strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="javaScript:void(0)" onclick="checkLoggedIn();" class="btn btn-fill-out">Proceed To CheckOut</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="medium_divider"></div>
                <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-6 d-none">
                <div class="heading_s1 mb-3">
                    <h6>Calculate Shipping</h6>
                </div>
                <form class="field_form shipping_calculator">
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <div class="custom_select">
                                <select class="form-control">
                                    <option value="">Choose a option...</option>
                                    <option value="AX">Aland Islands</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <input required="required" placeholder="State / Country" class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="required" placeholder="PostCode / ZIP" class="form-control" name="name" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <button class="btn btn-fill-line" type="submit">Update Totals</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="section d-none" id="cart_empty_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center order_complete">
                        <i class="ti-shopping-cart"></i>
                        <div class="heading_s1">
                            <h3>Your cart is empty !</h3>
                        </div>
                        <p>You cart is empty, Click continue shopping</p>
                        <a href="{{route('viewHome')}}" class="btn btn-sm btn-fill-out">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('customer.layout.login-form')
            </div>
        </div>
    </div>
</div>
@endsection
@section('customer-js')
<script src="{{asset('assets/js/customer/cart/create-update-cart.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/customer/login/customer-login.js')}}" type="text/javascript"></script>
@endsection
