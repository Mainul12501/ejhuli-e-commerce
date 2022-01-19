@extends('customer.layout.master-page-support')
@section('title','Create Password')
@section('page-content')
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1"><h3>Create Password</h3></div>
                        <form id="createNewPasswordForm">
                            <div class="form-group">
                                <input type="password" name="password" id="password"  class="form-control"  placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control"  placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="token" value="{{$token}}">
                                <button type="submit" class="btn btn-fill-out btn-block" >Change Password</button>
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
