@extends('customer.layout.master-page-support')
@section('title','Wallet Requests detail')
@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 hide-in-mobile">
            @include('customer.layout.customer-menus')
        </div>
        <div class="col-md-9">
            <div class="section customer-home-section pt-1">
                <div class="wallet-card">
                    <h3>Wallet request detail <span class="float-right"><a href="{{route('downloadWalletRequestInfo',[$requestInfo->id])}}"><i class="fa fa-download"></i></a> </span></h3>
                    <div class="listed-detail mt-3">
                        <div class="icon-wrapper">
                            <div class="iconbox">
                                @if($requestInfo->status == 1)
                                    <i class="ti-timer" style="color: white"></i>
                                @elseif($requestInfo->status == 2)
                                    <i class="ti-check" style="color: white"></i>
                                @elseif($requestInfo->status == 3)
                                <i class="fa fa-exclamation" style="color: white"></i>
                                @endif
                            </div>
                        </div>
                        @if($requestInfo->status == 1)
                        <h3 class="text-center mt-2">Request Pending</h3>
                        @elseif($requestInfo->status == 2)
                            <h3 class="text-center mt-2">Money added to wallet</h3>
                        @elseif($requestInfo->status == 3)
                            <h3 class="text-center mt-2">Request archived</h3>
                        @endif
                    </div>
                    <div class="recent-transaction pl-3 pr-3">
                        <ul class="listview simple-listview no-space mt-3">
                            <li>
                                <span>Wallet Request ID</span>
                                <strong>{{$requestInfo->request_id}}</strong>
                            </li>
                            <li>
                                <span>Transaction Id</span>
                                <strong>{{$requestInfo->txn_id}}</strong>
                            </li>
                            <li>
                                <span>Payment Method</span>
                                <strong>{{$requestInfo->payment_method}}</strong>
                            </li>
                            <li>
                                <span>Status</span>
                                @if($requestInfo->status == 1)
                                <strong>Pending</strong>
                                @elseif($requestInfo->status == 2)
                                    <strong>Approved</strong>
                                @elseif($requestInfo->status == 3)
                                    <strong>Archived</strong>
                                @endif
                            </li>
                            <li>
                                <span>From</span>
                                <strong>{{$requestInfo->first_name}}</strong>
                            </li>
                            <li>
                                <span>Contact</span>
                                <strong>{{$requestInfo->mobile}}</strong>
                            </li>
                            <li>
                                <span>Date</span>
                                <strong>{{date('F j, Y, g:i a',strtotime($requestInfo->created_at))}}</strong>
                            </li>
                            <li>
                                <span>Amount</span>
                                <strong>৳ {{$requestInfo->amount}}</strong>
                            </li>
                        </ul>
                        @if($requestInfo->status == 3)
                            <p class="text-small pt-3">* Please contact to admin</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
