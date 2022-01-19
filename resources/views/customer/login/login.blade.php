@extends('customer.layout.master-page-support')
@section('title','Sign In')
@section('page-content')
    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Login</h3>
                            </div>
                           @include('customer.layout.login-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
@endsection
@section('customer-js')
<script src="{{asset('assets/js/customer/login/customer-login.js')}}" type="text/javascript"></script>
@endsection
