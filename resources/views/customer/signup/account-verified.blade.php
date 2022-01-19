@extends('customer.layout.master-page-support')
@section('title','Account Verified')
@section('page-content')
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                    <i class="linearicons-accessibility"></i>
                    <div class="heading_s1">
                        <h3>Account verified :)</h3>
                    </div>
                    <p>Thank you for verifying your account. It means you have been become a customer of ShopZEN</p>
                    <a href="{{route('viewCustomerDashboard')}}" class="btn btn-fill-out">Go Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
