@extends('customer.layout.master-page-support')
@section('title','Password Reset')
@section('page-content')
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1"><h3>Password Reset</h3></div>
                        <form id="resetPasswordForm">
                            <div class="form-group">
                                <input type="text" name="reset_email" id="reset_email" class="form-control"  placeholder="Your Email">
                            </div>
                           {{-- <div class="form-group">
                                <input type="text" name="reset_phone" id="reset_phone" class="form-control" maxlength="12" placeholder="Your mobile">
                            </div>--}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" >Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customer-js')
<script src="{{asset('assets/js/customer/login/customer-password-reset.js')}}" type="text/javascript"></script>
@endsection
