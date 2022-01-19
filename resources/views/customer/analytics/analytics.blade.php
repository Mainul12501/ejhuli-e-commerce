@extends('customer.layout.master-page-support')
@section('title','Analytics')
@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 hide-in-mobile">
            @include('customer.layout.customer-menus')
        </div>
        <div class="col-md-9" style="padding: 5px;">
            <div class="section customer-home-section pt-1">
                <div class="wallet-card">
                    <h3>Analytics</h3>
                    <div class="row">
                        <div class="col">
                            <div class="balance">
                                <div class="left">
                                    <span class="title">Wallet Balance</span>
                                    <h1 class="total" id="currentBalance">৳ {{$wallet_balance}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="balance">
                                <div class="left">
                                    <span class="title">Total Spent</span>
                                    <h1 class="total" id="currentBalance">৳ {{$total_spent}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="balance">
                                <div class="left">
                                    <span class="title">Order Placed</span>
                                    <h1 class="total" id="currentBalance">{{$total_orders}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
