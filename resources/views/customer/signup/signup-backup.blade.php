@extends('customer.layout.master-page-support')
@section('page-content')
    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Looks like you're<br/> new here !</h3>
                            </div>
                            <div class="account-created-success" style="display: none">Account Created !</div>
                            <form id="customerSignUpForm">
                                <div class="form-group" id="mobile_field">
                                    <input type="text" name="mobile_number" id="mobile_number" autocomplete="off" maxlength="10" class="form-control"  placeholder="Enter Your mobile">
                                    <div class="error" id="mobile_numberError"></div>
                                </div>
                                <div class="form-group" id="otpField" style="display: none">
                                    <input type="text" name="otp" id="otp" autocomplete="off" class="form-control"  placeholder="Enter Your OTP">
                                    <div class="error" id="otpError"></div>
                                </div>
                                <div class="form-group" id="emailField" style="display: none">
                                    <input type="text" name="email" id="email" autocomplete="off" class="form-control"  placeholder="Enter Your email">
                                    <div class="error" id="emailError"></div>
                                </div>
                                <div class="form-group" id="passwordField" style="display: none">
                                    <input type="password" name="password" id="password"  class="form-control"  placeholder="Password">
                                    <div class="error" id="passwordError"></div>
                                </div>

                                <div class="lds-ellipsis" id="processIcons"  style="display:none;">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="signupFlag" id="signupFlag" value="verifyMobile"/>
                                    <button type="submit" class="btn btn-fill-out btn-block" name="signupBtn" id="signupBtn">Signup</button>
                                </div>
                            </form>
                            <div class="different_login d-none">
                                <span> or</span>
                            </div>
                            <ul class="btn-login list_none text-center d-none">
                                <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                            </ul>
                            <div class="form-note text-center">Already have an account? <a href="{{route('viewLogin')}}">Log in</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- END LOGIN SECTION -->
@section('customer-js')
    <script src="{{asset('assets/js/customer/signup/customer-signup.js')}}"></script>
@endsection


