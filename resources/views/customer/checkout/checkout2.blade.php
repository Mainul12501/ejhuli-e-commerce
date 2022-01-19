@extends('customer.layout.master-page-support')
@section('title','Checkout')
@section('page-content')

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
            <div class="row">
                <div class="col-lg-6">
                    <div class="toggle_info">
                        <span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                    </div>
                    <div class="panel-collapse collapse login_form" id="loginform">
                        <div class="panel-body">
                            <div class="account-login-failed" style="display: none">Login  failed !</div>
                            <form id="customerLoginForm">
                                <div class="form-group">
                                    <input type="text" name="mobile" id="mobile" class="form-control" maxlength="10" placeholder="Your Mobile">
                                    <div class="error" id="mobileError"></div>
                                </div>
                                <div class="form-group">
                                    <input type="password"  name="password" id="password" class="form-control" placeholder="Password">
                                    <div class="error" id="passwordError"></div>
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="rememberMeCheckBox">
                                            <label class="form-check-label" for="rememberMeCheckBox"><span>Remember me</span></label>
                                        </div>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="loginBtn" id="loginBtn" class="btn btn-fill-out btn-block" >Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="toggle_info">
                        <span><i class="fas fa-user"></i>New customer? <a href="{{route('viewSignup')}}" target="_blank">Click here to signup</a></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1">
                            <h4>Billing Details</h4>
                        </div>
                            <div class="form-group">
                                <input type="text" required class="form-control" name="fname" placeholder="First name *">
                            </div>
                            <div class="form-group">
                                <input type="text" required class="form-control" name="lname" placeholder="Last name *">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required type="text" name="email" placeholder="Email address *">
                            </div>
                            <div class="form-group">
                                <div class="custom_select">
                                    <select class="form-control">
                                        <option value="">Select an country</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="PW">Belau</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="form-control" required type="text" name="state" placeholder="State *">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required type="text" name="city" placeholder="City / Town *">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="billing_address" required="" placeholder="Address *">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="billing_address2" required="" placeholder="Address line2">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required type="text" name="zipcode" placeholder="Postcode / ZIP *">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="contact" placeholder="Contact *">
                            </div>

                            <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                        <label class="form-check-label label_info" for="createaccount"><span>Create an account?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group create-account">
                                <input class="form-control" type="text" name="otp" id="otp" placeholder="OTP *">
                                <div class="success-label-message" id="otpSendStatus"></div>
                                <div class="error" id="otpError"></div>
                            </div>
                            <div class="form-group create-account">
                                <input class="form-control"  type="password"  name="password" placeholder="Password *">
                            </div>
                            <div class="ship_detail">
                                <div class="form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                            <label class="form-check-label label_info" for="differentaddress"><span>Ship to a different address?</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="different_address">
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="fname" placeholder="First name *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" required class="form-control" name="lname" placeholder="Last name *">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required type="text" name="cname" placeholder="Company Name">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom_select">
                                            <select class="form-control">
                                                <option value="">Select an option...</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="billing_address" required="" placeholder="Address *">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="billing_address2" required="" placeholder="Address line2">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required type="text" name="city" placeholder="City / Town *">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required type="text" name="state" placeholder="State / County *">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required type="text" name="zipcode" placeholder="Postcode / ZIP *">
                                    </div>
                                </div>
                            </div>
                            <div class="heading_s1">
                                <h4>Additional information</h4>
                            </div>
                            <div class="form-group mb-0">
                                <textarea rows="5" class="form-control" placeholder="Order notes"></textarea>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">

                            <div class="heading_s1">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table">
                                <img class="img-center" src="{{asset('assets/images/loaders/flower.gif')}}"/>
                            </div>
                            <div class="payment_method">
                                <div class="heading_s1">
                                    <h4>Payment</h4>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_option" id="paymentFromWallet" value="wallet" checked="">
                                        <label class="form-check-label" for="paymentFromWallet">Direct From Wallet</label>
                                        <p data-method="wallet" class="payment-text" style="display: block;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="payment_option" id="cod" value="cod">
                                        <label class="form-check-label" for="cod">Cash on delivery</label>
                                        <p data-method="cod" class="payment-text" style="display: none;">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END SECTION SHOP -->
@endsection
@section('customer-js')
    <script src="{{asset('assets/js/customer/login/customer-login.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/customer/cart/create-update-cart.js')}}"></script>
@endsection
