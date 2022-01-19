@extends('customer.layout.master-page-support')
@section('title','Profile')
@section('page-content')
    <style>
        .padding {
            padding: 3rem !important
        }

        .user-card-full {
            overflow: hidden
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px
        }

        .m-r-0 {
            margin-right: 0px
        }

        .m-l-0 {
            margin-left: 0px
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px
        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#FF324D));
            background: linear-gradient(to right, #FF324D, #f29263)
        }

        .user-profile {
            padding: 20px 0
        }

        .card-block {
            padding: 1.25rem
        }

        .m-b-25 {
            margin-bottom: 25px
        }

        .img-radius {
            border-radius: 5px
        }

        h6 {
            font-size: 14px
        }

        .card .card-block p {
            line-height: 25px
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px
            }
        }

        .card-block {
            padding: 1.25rem
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .card .card-block p {
            line-height: 25px
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .text-muted {
            color: #919aa3 !important
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .f-w-600 {
            font-weight: 600
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .user-card-full .social-link li {
            display: inline-block
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }
    </style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 hide-in-mobile">
            @include('customer.layout.customer-menus')
        </div>
        <div class="col-md-9" style="padding: 5px;">
            <div class="section customer-home-section pt-1">
                <div class="wallet-card">
                    <h3>Profile
                        <span style="font-size: 15px;">
                            <a href="javaScript:void(0)" id="edit-mode" class="ml-2" onclick="editProfile();">Edit</a>
                        </span>
                    </h3>
                    <div class="page-content page-container" id="page-content">
                        <div class="row container d-flex justify-content-center">
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
{{--                                                    <img src="@if(!Auth::user()->profile_pic){{asset('assets/images/avtar/default-customer-avtar.jpg')}}--}}
{{--                                                    @else {{asset('storage/uploads/profile/customer/'.Auth::user()->profile_pic)}}--}}
{{--                                                    @else {{ url('../storage/uploads/profile/customer/'.Auth::user()->profile_pic)}}--}}
{{--                                                    @endif" class="img-profile img-responsive" alt="User-Profile-Image"/>--}}
                                                    <img src="{{ !Auth::user()->profile_pic ? asset('assets/images/avtar/default-customer-avtar.jpg') : asset('storage/uploads/profile/customer/'.Auth::user()->profile_pic) }}" class="img-profile img-responsive" alt="User-Profile-Image" />
                                                </div>
                                                <h6 class="f-w-600 text-white">{{$profile->first_name. ' '. $profile->last_name}}</h6>
                                                <p class="text-white">Customer</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">First name</p>
                                                        <h6 class="text-muted f-w-400">{{$profile->first_name}}</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Last Name</p>
                                                        <h6 class="text-muted f-w-400">{{$profile->last_name}}</h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Email</p>
                                                        <h6 class="text-muted f-w-400">{{$profile->email}}</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-10 f-w-600">Contact</p>
                                                        <h6 class="text-muted f-w-400">{{$profile->customer_contact}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="profileModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="updateProfileForm" style="padding: 10px;">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{$profile->first_name??''}}"  placeholder="Enter First Name">
                            <div id="first_nameError" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{$profile->last_name??''}}"   placeholder="Enter Last Name">
                            <div id="last_nameError" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{$profile->email??''}}"  placeholder="Enter Email Address">
                            <div id="emailError" class="error"></div>
                        </div>
                        <div class="form-group">
                            <label for="address_contact">Contact</label>
                            <input type="text" name="contact"  id="contact" class="form-control" value="{{$profile->customer_contact??''}}"  placeholder="Enter Contact" maxlength="11">
                            <div id="contactError" class="error"></div>
                        </div>
                        <div class="profile-pic-input">
                            <div class="form-group">
                                <label for="profile_pic">Profile</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="profile_pic" name="profile_pic">
                                    <input type="hidden" name="pre_profile" id="pre_profile" value="{{Auth::user()->profile_pic}}">
                                    <label class="custom-file-label" for="profile_pic">Choose file</label>
                                </div>
                                <div id="profile_picError" class="error"></div>
                            </div>
                        </div>
                        <div class="d-none" id="otpField">
                            <div class="form-group">
                                <label for="address_contact">OTP</label>
                                <input type="text" name="otp"  id="otp" class="form-control" placeholder="Enter Your OTP">
                                <div class="error" id="otpError"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="flag" id="flag" value=""/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="updateProfileBtn" class="btn btn-fill-out btn-block">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('customer-js')
<script src="{{asset('assets/js/customer/profile/profile-update.js')}}" type="text/javascript"></script>
@endsection
